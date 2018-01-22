<?php

namespace App\Http\Controllers;

use App\Item;
use App\Mail\Invoice;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use App\order;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PdfController extends Controller
{
    public static function fun_pdf($id)
    {
        $orderInfo = Item::where('invoice_id','=', $id)->get();
        $invoiceInfo = Invoice::where('id', '=', $orderInfo->invoice_id)->get();
        $current_time = Carbon::now()->toDateTimeString();
        $user = User::where('id', '=', 1)->first();

        $pdf = PDF::loadView('email.pdf');
        $pdf->save(storage_path('app/invoices/invoiceAmoWebshop'.$id.'.pdf'));
        $path = storage_path('app/invoices/invoiceAmoWebshop'.$id.'.pdf');

        $data = [
            'name' => $user->name,
            'link' => env('APP_URL')
        ];

        Mail::send('email/invoice', $data, function($message) use ($user, $pdf, $id, $path)
        {
            $message->attach($path);
            $message->to($user->email);
            $message->subject('PDF');
        });

        Storage::delete($path);
        return back();
    }
}
