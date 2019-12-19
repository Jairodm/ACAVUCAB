<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_horario_y_empleado
 * @property float $codigo_horario
 * @property string $cedula_empleado
 * @property Horario $horario
 * @property Empleado $empleado
 */
class Horario_y_Empleado extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'horario_y_empleado';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_horario_y_empleado';

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
    protected $fillable = ['codigo_horario', 'cedula_empleado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function horario()
    {
        return $this->belongsTo('App\Horario', 'codigo_horario', 'codigo_horario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleado()
    {
        return $this->belongsTo('App\Empleado', 'cedula_empleado', 'cedula_empleado');
    }
}
