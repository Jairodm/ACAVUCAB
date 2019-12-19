<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_vacacion
 * @property string $fk_empleado
 * @property string $fecha_inicio_vacacion
 * @property string $fecha_fin_vacacion
 * @property Empleado $empleado
 */
class Vacacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'vacacion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_vacacion';

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
    protected $fillable = ['fk_empleado', 'fecha_inicio_vacacion', 'fecha_fin_vacacion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleado()
    {
        return $this->belongsTo('App\Empleado', 'fk_empleado', 'cedula_empleado');
    }
}
