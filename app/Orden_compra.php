<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_orden_compra
 * @property string $fk_empleado
 * @property string $fk_proveedor
 * @property string $fecha_orden_compra
 * @property float $monto_total_orden_compra
 * @property Empleado $empleado
 * @property Proveedor $proveedor
 * @property EstatusYOrden[] $estatusYOrdens
 * @property DetalleCompra[] $detalleCompras
 */
class Orden_compra extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'orden_compra';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_orden_compra';

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
    protected $fillable = ['fk_empleado', 'fk_proveedor', 'fecha_orden_compra', 'monto_total_orden_compra'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleado()
    {
        return $this->belongsTo('App\Empleado', 'fk_empleado', 'cedula_empleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor', 'fk_proveedor', 'rif_proveedor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estatusYOrdens()
    {
        return $this->hasMany('App\EstatusYOrden', 'orden', 'codigo_orden_compra');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleCompras()
    {
        return $this->hasMany('App\DetalleCompra', 'orden_compra', 'codigo_orden_compra');
    }
}
