<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_horario
 * @property string $dia
 * @property string $hora_entrada
 * @property string $hora_salida
 * @property HorarioYEmpleado[] $horarioYEmpleados
 */
class Horario extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'horario';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_horario';

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
    protected $fillable = ['dia', 'hora_entrada', 'hora_salida'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarioYEmpleados()
    {
        return $this->hasMany('App\HorarioYEmpleado', 'codigo_horario', 'codigo_horario');
    }
}
