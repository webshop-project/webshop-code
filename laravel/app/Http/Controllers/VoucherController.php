<?php

namespace App\Http\Controllers;

use App\Mail\Vouchers;
use App\User;
use App\voucher;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker;
use App\Voucher_used;
use Psr\Log\NullLogger;


class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = voucher::all();
        return view('admin/vouchers/voucherUsed')->with('vouchers', $vouchers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('admin/vouchers/voucherAdd')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faker = Faker\Factory::create('nl_NL');
        $code = $faker->isbn10();
        $shopLink = env('APP_URL', 'http://amo.rocks/shop');

        $this->validate($request, [
            'userOption' => 'required|string|min:1',
            'userId' => 'required|string|min:1',
            'codeValue' => 'required|int|min:1',
            'startDate' => 'required|date|before:endDate',
            'endDate' => 'required|date|after:startDate',
        ]);

        $voucher = new \App\voucher();
        if ($request->userOption == 0){
            $voucher->user_id = NULL;
        }
        else{
            $voucher->user_id = $request->userId;
        }
        $voucher->code = $code;
        $voucher->codeValue = $request->codeValue;
        $voucher->startDate = $request->startDate . ' 00:00:01';
        $voucher->endDate = $request->endDate . ' 23:59:59';
        $voucher->created_at = Now();
        $voucher->updated_at = Now();
        $voucher->save();

        if ($request->userOption == 0 && $request->userId == 0)
        {
            $users = \App\User::all();
            foreach ($users as $user)
            {
                Mail::to($user->email)->queue(new Vouchers($user->name, $code, $request->codeValue, $request->startDate . ' 00:00:01', $request->endDate . ' 23:59:59', $shopLink,public_path() . '/img/voucher_top.png', public_path() . '/img/voucher_botom.png'), function ($message){

                }  );
            }
        }
        else{
            $oneUser = \App\User::find($request->userId);
            Mail::to($oneUser->email)->queue(new Vouchers($oneUser->name,$code, $request->codeValue, $request->startDate . ' 00:00:01', $request->endDate . ' 23:59:59', $shopLink, public_path() . '/img/voucher_top.png', public_path() . '/img/voucher_botom.png'), function ($message){

            }  );
        }

        return back();
    }

    /**
     * Check the specified resource.
     *
     * @param  \App\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $code = $request->voucherCode;
        $session = $request->session();
        $value = str_replace(",", ".", $request->total);
        $total = $value;
        if($code != '')
        {

            $vouchers = voucher::where('code', '=', $code)->first();


            if($vouchers != null)
            {
                if($vouchers->code == $code)
                {

                    $user = User::where('id','=',$vouchers->user_id);
                    if($user != null)
                    {

                        $used = Voucher_used::find($vouchers->id);

                        if($used == null)
                        {


                            $codeValue = $vouchers->codeValue;
                            $newPrice = $total - $codeValue ;


                            $message = 'The code is right! enjoy your €' . $codeValue . ' off!';
                            $positive = 1;
                            $request->session()->put('message', $message);
                            $request->session()->put('value', $newPrice);
                            $request->session()->put('discount', $codeValue);
                            $request->session()->put('positive', $positive);
                            return redirect('/shop/cart');
                        }
                        else{
                            $message = 'This code has already been used';
                            $request->session()->put('message', $message);
                            return redirect('/shop/cart');
                        }

                    }
                    else{
                        $message = ' c Wrong code, check your mail!';
                        $request->session()->put('message', $message);
                        return redirect('/shop/cart');
                    }

                }
                else{
                    $message = ' b Wrong code, check your mail!';
                    $request->session()->put('message', $message);
                    return redirect('/shop/cart');
                }
            }
            else{
                $message = ' a Wrong code, check your mail!';
                $request->session()->put('message', $message);
                return redirect('/shop/cart');

            }
        }
        else
        {
            $message = 'Please fill in a code! check your mail';
            $request->session()->put('message', $message);
            return redirect('/shop/cart');
        }



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(voucher $voucher)
    {
        //
    }
}
