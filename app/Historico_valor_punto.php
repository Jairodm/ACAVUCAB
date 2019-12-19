<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_valor_punto
 * @property float $fk_metodo_pago
 * @property float $valor_punto
 * @property string $fecha
 * @property MetodoPago $metodoPago
 */
class Historico_valor_punto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'historico_valor_punto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_valor_punto';

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
    protected $fillable = ['fk_metodo_pago', 'valor_punto', 'fecha'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function metodoPago()
    {
        return $this->belongsTo('App\MetodoPago', 'fk_metodo_pago', 'codigo_metodo_pago');
    }
}
