<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use PDF;
use App\order;
use App\User;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\DB;


class PdfController extends Controller
{


    public function fun_pdf(Request $request)
    {
        $orderInfo = order::where('id','=', $request->order_id)->first();
        $user = User::where('id', '=', $orderInfo->user_id)->first();

        $pdf = PDF::loadView('email.invoice')->with('order', $orderInfo);
        $email = new PHPMailer();
        $email->From      = 'Damian.meijer@gmail.com';
        $email->FromName  = 'Damian';
        $email->Subject   = 'Thank you!';
        $email->Body      = 'Thanks for your purchase!';
        $email->AddAddress( "$user->email" );

        $file_to_attach = 'view/email/invoice';

        $email->AddAttachment( $file_to_attach , 'Invoice.pdf' );

        return $email->Send();
    }
}
