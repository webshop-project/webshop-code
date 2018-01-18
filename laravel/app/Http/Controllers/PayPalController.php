<?php
namespace App\Http\Controllers;
use App\Invoice;
use App\Item;
use Carbon\Carbon;
use \Cart as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Srmklive\PayPal\Services\AdaptivePayments;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CartController;
class PayPalController extends Controller
{
    /**
     * @var ExpressCheckout
     */
    protected $provider;
    public function __construct()
    {
        $this->provider = new ExpressCheckout();
    }
    public function getIndex(Request $request)
    {
        $response = [];
        if (session()->has('code')) {
            $response['code'] = session()->get('code');
            session()->forget('code');
        }
        if (session()->has('message')) {
            $response['message'] = session()->get('message');
            session()->forget('message');
        }
        return view('welcome', compact('response'));
    }
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getExpressCheckout(Request $request)
    {
//        $recurring = ($request->get('mode') === 'recurring') ? true : false;
        $cart = $this->getCheckoutData($request);
        try {
            $response = $this->provider->setExpressCheckout($cart);
            return redirect($response['paypal_link']);
        } catch (\Exception $e) {
            $invoice = $this->createInvoice($cart, 'Invalid');
            session()->put(['code' => 'danger', 'message' => "Error processing PayPal payment for Order $invoice->id!"]);
        }
    }
    /**
     * Process payment on PayPal.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getExpressCheckoutSuccess(Request $request)
    {
        $recurring = ($request->get('mode') === 'recurring') ? true : false;
        $token = $request->get('token');
        $PayerID = $request->get('PayerID');
        $cart = $this->getCheckoutData($recurring);
        // Verify Express Checkout Token
        $response = $this->provider->getExpressCheckoutDetails($token);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            if ($recurring === true) {
                $response = $this->provider->createMonthlySubscription($response['TOKEN'], 9.99, $cart['subscription_desc']);
                if (!empty($response['PROFILESTATUS']) && in_array($response['PROFILESTATUS'], ['ActiveProfile', 'PendingProfile'])) {
                    $status = 'Processed';
                } else {
                    $status = 'Invalid';
                }
            } else {
                // Perform transaction on PayPal
                $payment_status = $this->provider->doExpressCheckoutPayment($cart, $token, $PayerID);
                $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
            }
            $invoice = $this->createInvoice($cart, $status);
            if ($invoice->paid) {
                session()->flash('success_message',"Your order has been paid successfully!");
            } else {
                session()->flash('error_message', "Error processing PayPal payment for your order!");
            }

            Session::forget('request');
            Session::forget('discount');

            $isEmpty = $this->deleteCart();
            if ($isEmpty == false)
            {
                echo 'Error';
            }
            else{
                return redirect('/');
            }

        }
    }
    public function getAdaptivePay()
    {
        $this->provider = new AdaptivePayments();
        $data = [
            'receivers'  => [
                [
                    'email'   => 'johndoe@example.com',
                    'amount'  => 10,
                    'primary' => true,
                ],
                [
                    'email'   => 'janedoe@example.com',
                    'amount'  => 5,
                    'primary' => false,
                ],
            ],
            'payer'      => 'EACHRECEIVER', // (Optional) Describes who pays PayPal fees. Allowed values are: 'SENDER', 'PRIMARYRECEIVER', 'EACHRECEIVER' (Default), 'SECONDARYONLY'
            'return_url' => url('payment/success'),
            'cancel_url' => url('payment/cancel'),
        ];
        $response = $this->provider->createPayRequest($data);
        dd($response);
    }
    /**
     * Parse PayPal IPN.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function notify(Request $request)
    {
        if (!($this->provider instanceof ExpressCheckout)) {
            $this->provider = new ExpressCheckout();
        }
        $request->merge(['cmd' => '_notify-validate']);
        $post = $request->all();
        $response = (string) $this->provider->verifyIPN($post);
        $logFile = 'ipn_log_'.Carbon::now()->format('Ymd_His').'.txt';
        Storage::disk('local')->put($logFile, $response);
    }
    /**
     * Set cart data for processing payment on PayPal.
     *
     * @param bool $recurring
     *
     * @return array
     */
    protected function getCheckoutData($request)
    {
        $recurring = false;
        $data = [];
        $order_id = Invoice::all()->count() + 1;
        if ($recurring === true) {
            $data['items'] = [
                [
                    'name'  => 'Monthly Subscription '.config('paypal.invoice_prefix').' #'.$order_id,
                    'price' => 0,
                    'qty'   => 1,
                ],
            ];
            $data['return_url'] = url('/paypal/ec-checkout-success?mode=recurring');
            $data['subscription_desc'] = 'Monthly Subscription '.config('paypal.invoice_prefix').' #'.$order_id;
        } else {
            if ($request != false){
                $value = str_replace(",", ".", $request->price);
                Session::put('request', $request->item);
                Session::put('discount', $request->discount);
            }
            else{

            }
            $data['items'] = Session::get('request');
            $data['return_url'] = url('/paypal/ec-checkout-success');
        }

        $data['invoice_id'] = $order_id;
        $data['invoice_description'] = "Order #$order_id Invoice";
        $data['cancel_url'] = url('/');
        $total = 0;
        if (Session::get('discount')){
            
            foreach ($data['items'] as $item) {
                $value = str_replace(",", ".", $item['price']);
                $total += floatval($value) * $item['qty'];
            }
            $discount = str_replace(",", ".", Session::get('discount'));
            $total -= floatval($discount);

        }
        else{
            foreach ($data['items'] as $item) {
                $value = str_replace(",", ".", $item['price']);
                $total += floatval($value) * $item['qty'];
            }
        }

        $data['total'] = $total;
        return $data;
    }
    /**
     * Create invoice.
     *
     * @param array  $cart
     * @param string $status
     *
     * @return \App\Invoice
     */
    protected function createInvoice($cart, $status)
    {
        $invoice = new Invoice();
        $invoice->title = $cart['invoice_description'];
        $invoice->price = $cart['total'];
        if (!strcasecmp($status, 'Completed') || !strcasecmp($status, 'Processed')) {
            $invoice->paid = 1;
        } else {
            $invoice->paid = 0;
        }
        $invoice->save();
        collect($cart['items'])->each(function ($product) use ($invoice) {
            $item = new Item();
            $item->invoice_id = $invoice->id;
            $item->item_name = $product['name'];
            $item->item_price = $product['price'];
            $item->item_qty = $product['qty'];
            $item->save();
        });
        return $invoice;
    }

    protected function deleteCart(){
        $deleted = Cart::destroy();
        if ($deleted != NULL){
            return false;
        }
        else {
            return true;
        }
    }
}