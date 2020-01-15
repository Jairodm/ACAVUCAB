<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_estatus_y_venta
 * @property float $estatus
 * @property float $venta
 * @property string $fecha_estatus
 * @property Estatus $estatus
 * @property Ventum $ventum
 */
class Estatus_y_venta extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'estatus_y_venta';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_estatus_y_venta';

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
    protected $fillable = ['estatus', 'venta', 'fecha_estatus'];

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
    public function ventum()
    {
        return $this->belongsTo('App\Ventum', 'venta', 'numero_factura');
    }
}
