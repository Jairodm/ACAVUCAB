<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_detalle_venta_evento
 * @property float $cerveza
 * @property float $venta_evento
 * @property float $cantidad_venta_evento
 * @property float $precio_unitario_venta_evento
 * @property Cerveza $cerveza
 * @property VentaEvento $ventaEvento
 * @property InventarioEvento[] $inventarioEventos
 */
class Detalle_venta_evento extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detalle_venta_evento';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_detalle_venta_evento';

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
    protected $fillable = ['cerveza', 'venta_evento', 'cantidad_venta_evento', 'precio_unitario_venta_evento'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cerveza()
    {
        return $this->belongsTo('App\Cerveza', 'cerveza', 'codigo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ventaEvento()
    {
        return $this->belongsTo('App\VentaEvento', 'venta_evento', 'numero_factura_evento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventarioEventos()
    {
        return $this->hasMany('App\InventarioEvento', 'fk_venta_evento', 'codigo_detalle_venta_evento');
    }
}
