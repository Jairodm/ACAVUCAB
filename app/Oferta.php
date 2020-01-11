<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_oferta
 * @property string $fk_empleado
 * @property float $fk_cerveza
 * @property string $fecha_inicio_oferta
 * @property string $fecha_fin_oferta
 * @property float $porcentaje
 * @property Empleado $empleado
 * @property Cerveza $cerveza
 * @property OfertaYCerveza[] $ofertaYCervezas
 */
class Oferta extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'oferta';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_oferta';

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
    protected $fillable = ['fk_empleado', 'fk_cerveza', 'fecha_inicio_oferta', 'fecha_fin_oferta', 'porcentaje'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleado()
    {
        return $this->belongsTo('App\Empleado', 'fk_empleado', 'cedula_empleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cerveza()
    {
        return $this->belongsTo('App\Cerveza', 'fk_cerveza', 'codigo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ofertaYCervezas()
    {
        return $this->hasMany('App\OfertaYCerveza', 'fk_oferta', 'codigo_oferta');
    }
}
