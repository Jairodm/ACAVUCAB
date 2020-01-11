<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_historico_divisa
 * @property float $fk_divisa
 * @property float $valor_divisa
 * @property string $fecha_valor
 * @property Divisa $divisa
 */
class historico_divisa extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'historico_divisa';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_historico_divisa';

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
    protected $fillable = ['fk_divisa', 'valor_divisa', 'fecha_valor'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function divisa()
    {
        return $this->belongsTo('App\Divisa', 'fk_divisa', 'codigo_divisa');
    }
}
