<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductPurchase extends Mailable
{
    use Queueable, SerializesModels;

    private $purchase = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($purchase)
    {
        $this->purchase = $purchase;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.product-purchase');
    }
}
