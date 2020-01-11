<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_asistencia
 * @property string $fk_empleado
 * @property string $fecha_asistencia
 * @property string $hora_entrada_asistencia
 * @property string $hora_salida_asistencia
 * @property Empleado $empleado
 */
class Asistencia extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'asistencia';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_asistencia';

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
    protected $fillable = ['fk_empleado', 'fecha_asistencia', 'hora_entrada_asistencia', 'hora_salida_asistencia'];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleado()
    {
        return $this->belongsTo('App\Empleado', 'fk_empleado', 'cedula_empleado');
    }
}
