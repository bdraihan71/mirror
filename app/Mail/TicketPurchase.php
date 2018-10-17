<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketPurchase extends Mailable
{
    use Queueable, SerializesModels;
    private $user = null;
    private $ticket = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $ticket)
    {
        $this->user = $user;
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.ticket-purchase')->with('user', $this->user)->with('ticket', $this->ticket);
    }
}
