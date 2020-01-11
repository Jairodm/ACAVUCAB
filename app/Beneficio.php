<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_beneficio
 * @property string $fk_empleado
 * @property string $tipo_beneficio
 * @property string $descripcion_beneficio
 * @property Empleado $empleado
 */
class Beneficio extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'beneficio';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_beneficio';

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
    protected $fillable = ['fk_empleado', 'tipo_beneficio', 'descripcion_beneficio'];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleado()
    {
        return $this->belongsTo('App\Empleado', 'fk_empleado', 'cedula_empleado');
    }
}
