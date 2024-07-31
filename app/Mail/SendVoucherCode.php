<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendVoucherCode extends Mailable
{
    use Queueable, SerializesModels;
    public $voucher,$activity;



    public function __construct($voucher,$activity)
    {
    $this->voucher = $voucher;
    $this->activity = $activity;
    }


    public function build()
    {
    return $this->subject('Voucher Discount Code')
                ->view('emails.voucherGift')
                ->with(['content' => $this->voucher,$this->activity]);
    }
}