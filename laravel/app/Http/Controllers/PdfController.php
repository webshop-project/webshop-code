<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;


class PdfController extends Controller
{
    public function fun_pdf()
    {

        $pdf = PDF::loadView('email.invoice');

        $pdf = '%PDF-1.2 6 0 obj << /S /GoTo /D (chapter.1) >>';

        Mail::to('Damian.meijer@gmail.com')->send(new HasPdfAttachment($pdf));
        return $pdf->download('invoice.pdf');
    }
}
