<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewMalaDiretas extends Mailable
{
    use Queueable, SerializesModels;

    protected $malaDireta;
    protected $cliente;

    public function __construct($cliente, $malaDireta)
    {
        $this->cliente = $cliente;
        $this->malaDireta = $malaDireta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.mala-direta')
            ->subject($this->malaDireta->assunto)
            ->from('gbxtelec@gmail.com', 'GBX Telecom e Consultoria')
            ->with([
                'cliente' => $this->cliente,
                'malaDireta' => $this->malaDireta,
            ]);
    }
}
