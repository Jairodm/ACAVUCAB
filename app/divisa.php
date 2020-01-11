<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_divisa
 * @property string $nombre_divisa
 * @property float $valor_divisa
 * @property HistoricoDivisa[] $historicoDivisas
 * @property MetodoPago[] $metodoPagos
 */
class divisa extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'divisa';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_divisa';
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
    protected $fillable = ['nombre_divisa', 'valor_divisa'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historicoDivisas()
    {
        return $this->hasMany('App\HistoricoDivisa', 'fk_divisa', 'codigo_divisa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metodoPagos()
    {
        return $this->hasMany('App\MetodoPago', 'fk_divisa', 'codigo_divisa');
    }
}
