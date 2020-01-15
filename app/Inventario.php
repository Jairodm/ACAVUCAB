<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_inventario
 * @property float $fk_cerveza
 * @property float $fk_venta
 * @property float $fk_orden
 * @property float $fk_evento
 * @property float $cantidad_operacion
 * @property float $cantidad_disponible
 * @property string $fecha_operacion
 * @property Cerveza $cerveza
 * @property DetalleVentum $detalleVentum
 * @property DetalleCompra $detalleCompra
 * @property InventarioEvento $inventarioEvento
 */
class Inventario extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'inventario';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_inventario';

    public $timestamps = false;

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
    protected $fillable = ['fk_cerveza', 'fk_venta', 'fk_orden', 'fk_evento', 'cantidad_operacion', 'cantidad_disponible', 'fecha_operacion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cerveza()
    {
        return $this->belongsTo('App\Cerveza', 'fk_cerveza', 'codigo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function detalleVenta()
    {
        return $this->belongsTo('App\DetalleVenta', 'fk_venta', 'codigo_detalle_venta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function detalleCompra()
    {
        return $this->belongsTo('App\DetalleCompra', 'fk_orden', 'codigo_detalle_compra');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventarioEvento()
    {
        return $this->belongsTo('App\InventarioEvento', 'fk_evento', 'codigo_inventario_evento');
    }
}
