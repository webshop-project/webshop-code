<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Vouchers extends Mailable
{
    use Queueable, SerializesModels;

    public $firstName;
    public $lastName;
    public $code;
    public $value;
    public $startDate;
    public $endDate;
    public $siteLink;
    public $topImage;
    public $bottomImage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userFirstName, $userLastName, $voucherCode, $voucherValue, $voucherStartDate, $voucherEndDate, $shopLink, $voucherTop, $voucherBottom)
    {
        $this->firstName = $userFirstName;
        $this->lastName = $userLastName;
        $this->code = $voucherCode;
        $this->value = $voucherValue;
        $this->startDate = $voucherStartDate;
        $this->endDate = $voucherEndDate;
        $this->siteLink = $shopLink;
        $this->topImage = $voucherTop;
        $this->bottomImage = $voucherBottom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.voucher');
    }
}
