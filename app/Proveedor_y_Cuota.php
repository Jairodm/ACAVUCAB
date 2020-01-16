<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_proveedor_y_cuota
 * @property string $rif_proveedor
 * @property int $codigo_cuota
 * @property int $fk_metodo_pago
 * @property string $estatus
 * @property string $fecha_pago
 * @property Proveedor $proveedor
 * @property MetodoPago $metodoPago
 * @property CuotaAfiliacion $cuotaAfiliacion
 */
class Proveedor_y_cuota extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'proveedor_y_cuota';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_proveedor_y_cuota';

    /**
     * @var array
     */
    protected $fillable = ['rif_proveedor', 'codigo_cuota', 'fk_metodo_pago', 'estatus', 'fecha_pago'];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor', 'rif_proveedor', 'rif_proveedor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function metodoPago()
    {
        return $this->belongsTo('App\MetodoPago', 'fk_metodo_pago', 'codigo_metodo_pago');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cuotaAfiliacion()
    {
        return $this->belongsTo('App\Cuota_afiliacion', 'codigo_cuota', 'codigo_cuota');
    }
}
