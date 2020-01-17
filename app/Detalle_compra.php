<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_detalle_compra
 * @property int $cerveza
 * @property int $orden_compra
 * @property float $cantidad_compra
 * @property float $precio_unitario_compra
 * @property Cerveza $cerveza
 * @property OrdenCompra $ordenCompra
 * @property Inventario[] $inventarios
 */
class Detalle_compra extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detalle_compra';

    public $timestamps = false;

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_detalle_compra';

    /**
     * @var array
     */
    protected $fillable = ['cerveza', 'orden_compra', 'cantidad_compra', 'precio_unitario_compra'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cervezax()
    {
        return $this->belongsTo('App\Cerveza', 'cerveza', 'codigo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordenCompra()
    {
        return $this->belongsTo('App\OrdenCompra', 'orden_compra', 'codigo_orden_compra');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventarios()
    {
        return $this->hasMany('App\Inventario', 'fk_orden', 'codigo_detalle_compra');
    }
}
