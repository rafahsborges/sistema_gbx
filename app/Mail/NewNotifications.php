<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewNotifications extends Mailable
{
    use Queueable, SerializesModels;

    protected $notification;
    protected $cliente;

    public function __construct($cliente, $notification)
    {
        $this->cliente = $cliente;
        $this->notification = $notification;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notification')
            ->subject($this->notification->assunto)
            ->from('gbxtelec@gmail.com', 'GBX Telecom e Consultoria')
            ->with([
                'cliente' => $this->cliente,
                'notification' => $this->notification,
            ]);
    }
}
