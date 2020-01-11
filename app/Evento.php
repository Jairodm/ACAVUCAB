<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_evento
 * @property int $fk_lugar
 * @property string $fecha_inicio_evento
 * @property string $fecha_fin_evento
 * @property string $hora_inicio_evento
 * @property string $hora_fin_evento
 * @property string $nombre_evento
 * @property string $descripcion_evento
 * @property string $direccion_evento
 * @property float $precio_entrada
 * @property Lugar $lugar
 * @property Evento_y_proveedor[] $eventoYProveedors
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
    public $timestamps = false;


    /**
     * @var array
     */
    protected $fillable = ['fk_lugar', 'fecha_inicio_evento', 'fecha_fin_evento', 'hora_inicio_evento', 'hora_fin_evento', 'nombre_evento', 'descripcion_evento', 'direccion_evento', 'precio_entrada'];

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
        return $this->hasMany('App\Evento_y_proveedor', 'fk_evento', 'codigo_evento');
    }

    public function proveedor()
    {
        return $this->belongsToMany('App\proveedor', 'evento_y_proveedor', 'fk_evento', 'fk_proveedor');
    }
}
