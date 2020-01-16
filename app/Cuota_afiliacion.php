<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_cuota
 * @property string $fecha_cuota
 * @property float $monto_cuota
 * @property ProveedorYCuotum[] $proveedorYCuotas
 */
class Cuota_afiliacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cuota_afiliacion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_cuota';

    /**
     * @var array
     */
    protected $fillable = ['fecha_cuota', 'monto_cuota'];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proveedorYCuotas()
    {
        return $this->hasMany('App\ProveedorYCuotum', 'codigo_cuota', 'codigo_cuota');
    }
}
