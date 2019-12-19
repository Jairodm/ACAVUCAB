<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_estatus
 * @property float $estatus
 * @property float $orden
 * @property string $fecha_estatus
 * @property Estatus $estatus
 * @property OrdenCompra $ordenCompra
 */
class Estatus_y_orden extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'estatus_y_orden';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_estatus';

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
    protected $fillable = ['estatus', 'orden', 'fecha_estatus'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estatus()
    {
        return $this->belongsTo('App\Estatus', 'estatus', 'codigo_estatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordenCompra()
    {
        return $this->belongsTo('App\OrdenCompra', 'orden', 'codigo_orden_compra');
    }
}
