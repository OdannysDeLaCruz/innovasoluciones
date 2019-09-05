<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmacionPedidoRealizado extends Mailable
{
    use Queueable, SerializesModels;

    private $pdf;
    private $filename;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf, $filename)
    {
        $this->pdf = $pdf;
        $this->filename = $filename;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ventas@innovainc.co', 'Innova Inc, confirmación de pedido realizado.')
                    ->view('emails.confirmacion_pedido')
                    ->attachData($this->pdf, $this->filename, [
                        'mime' => 'application/pdf',
                    ])
                    ->subject('Innova Inc, confirmación de pedido realizado.');
    }
}
