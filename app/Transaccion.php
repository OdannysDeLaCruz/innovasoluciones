<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = "transacciones";
    protected $fillable = [
        'estado',
        'mensaje_respuesta',
        'codigo_respuesta',
        'valor_transaccion',
        'metodo_pago_tipo',
        'metodo_pago_nombre',
        'metodo_pago_id',
        'id_transaccion',
        'referencia_venta_payu',
        'tipo_moneda_transaccion',
        'numero_cuotas_pago',
        'ip_transaccion',
        'pse_cus',
        'pse_bank',
        'pse_references',
        'fecha_transaccion',
        'fecha_creado'
    ];

    public $timestamps = false;
}
