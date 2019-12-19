<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_intercambio_puntos
 * @property float $fk_venta
 * @property string $fk_cliente
 * @property float $cantidad_intercambio
 * @property string $fecha_intercambio
 * @property Ventum $ventum
 * @property Cliente $cliente
 */
class Intercambio_puntos extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_intercambio_puntos';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'float';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['fk_venta', 'fk_cliente', 'cantidad_intercambio', 'fecha_intercambio'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ventum()
    {
        return $this->belongsTo('App\Ventum', 'fk_venta', 'numero_factura');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'fk_cliente', 'rif_cliente');
    }
}
