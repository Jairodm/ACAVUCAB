<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_detalle_venta
 * @property float $cerveza
 * @property float $venta
 * @property float $cantidad_venta
 * @property float $precio_unitario_venta
 * @property Cerveza $cerveza
 * @property Ventum $ventum
 * @property Inventario[] $inventarios
 */
class Detalle_venta extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detalle_venta';
    
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_detalle_venta';

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
    protected $fillable = ['cerveza', 'venta', 'cantidad_venta', 'precio_unitario_venta'];

    public $timestamps = false;

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
    public function ventum()
    {
        return $this->belongsTo('App\Ventum', 'venta', 'numero_factura');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventarios()
    {
        return $this->hasMany('App\Inventario', 'fk_venta', 'codigo_detalle_venta');
    }
}
