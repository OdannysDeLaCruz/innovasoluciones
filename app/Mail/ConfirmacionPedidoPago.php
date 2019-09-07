<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmacionPedidoPago extends Mailable
{
    use Queueable, SerializesModels;

    public $estado;
    public $valor;
    public $referencia;
    public $pedido_id;
    public $descripcion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($estado, $valor, $referencia, $pedido_id, $descripcion)
    {
        $this->estado       = $estado;
        $this->valor        = $valor;
        $this->referencia   = $referencia;
        $this->pedido_id   = $pedido_id;
        $this->descripcion  = $descripcion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ventas@innovainc.co', 'Confirmación de pago de tu pedido.')
                    ->view('emails.confirmacion_pedido_pago')
                    ->subject('Innova Inc, confirmación de pago de tu pedido.');
    }
}
