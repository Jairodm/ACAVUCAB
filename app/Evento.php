<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_evento
 * @property float $fk_lugar
 * @property string $fecha_inicio_evento
 * @property string $fecha_fin_evento
 * @property string $nombre_evento
 * @property Lugar $lugar
 * @property EventoYProveedor[] $eventoYProveedors
 * @property VentaEntrada[] $ventaEntradas
 * @property VentaEvento[] $ventaEventos
 */
class Evento extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'evento';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_evento';

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
    protected $fillable = ['fk_lugar', 'fecha_inicio_evento', 'fecha_fin_evento', 'nombre_evento'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lugar()
    {
        return $this->belongsTo('App\Lugar', 'fk_lugar', 'codigo_lugar');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventoYProveedors()
    {
        return $this->hasMany('App\EventoYProveedor', 'fk_evento', 'codigo_evento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventaEntradas()
    {
        return $this->hasMany('App\VentaEntrada', 'fk_evento', 'codigo_evento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventaEventos()
    {
        return $this->hasMany('App\VentaEvento', 'fk_evento', 'codigo_evento');
    }
}
