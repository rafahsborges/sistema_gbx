<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrcamentos extends Mailable
{
    use Queueable, SerializesModels;

    protected $orcamento;
    protected $cliente;

    public function __construct($cliente, $orcamento)
    {
        $this->cliente = $cliente;
        $this->orcamento = $orcamento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orcamento')
            ->subject($this->orcamento->assunto)
            ->from('gbxtelec@gmail.com', 'GBX Telecom e Consultoria')
            ->with([
                'cliente' => $this->cliente,
                'orcamento' => $this->orcamento,
            ]);
    }
}
