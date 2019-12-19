<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_venta_entrada
 * @property float $fk_evento
 * @property string $fk_cliente
 * @property float $precio_entrada
 * @property string $fecha_venta_entrada
 * @property Evento $evento
 * @property Cliente $cliente
 */
class Venta_entrada extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'venta_entrada';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_venta_entrada';

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
    protected $fillable = ['fk_evento', 'fk_cliente', 'precio_entrada', 'fecha_venta_entrada'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evento()
    {
        return $this->belongsTo('App\Evento', 'fk_evento', 'codigo_evento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'fk_cliente', 'rif_cliente');
    }
}
