<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_presupuesto
 * @property string $fk_cliente
 * @property string $fecha_presupuesto
 * @property float $monto_total_presupuesto
 * @property Cliente $cliente
 * @property DetallePresupuesto[] $detallePresupuestos
 */
class Presupuesto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'presupuesto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_presupuesto';

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
    protected $fillable = ['fk_cliente', 'fecha_presupuesto', 'monto_total_presupuesto'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'fk_cliente', 'rif_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallePresupuestos()
    {
        return $this->hasMany('App\DetallePresupuesto', 'fk_presupuesto', 'codigo_presupuesto');
    }
}
