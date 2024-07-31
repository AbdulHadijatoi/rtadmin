<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CouponMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $description;
    public $amount;
    public $voucherCode;

    public function __construct($email, $description, $amount, $voucherCode)
    {
        $this->email = $email;
        $this->description = $description;
        $this->amount = $amount;
        $this->voucherCode = $voucherCode;
    }

    public function build()
    {
        return $this->view('emails.coupon')
                    ->with([
                        'email' => $this->email,
                        'description' => $this->description,
                        'amount' => $this->amount,
                        'voucherCode' => $this->voucherCode,
                    ]);
    }
}