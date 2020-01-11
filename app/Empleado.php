<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $cedula_empleado
 * @property float $fk_cargo
 * @property string $primer_nombre_empleado
 * @property string $segundo_nombre_empleado
 * @property string $primer_apellido_empleado
 * @property string $segundo_apellido_empleado
 * @property string $fecha_nacimiento
 * @property float $salario
 * @property Cargo $cargo
 * @property Usuario[] $usuarios
 * @property Beneficio[] $beneficios
 * @property Vacacion[] $vacacions
 * @property Asistencium[] $asistencias
 * @property HorarioYEmpleado[] $horarioYEmpleados
 * @property Ofertum[] $ofertas
 * @property Ventum[] $ventas
 * @property Ventum[] $ventas
 * @property OrdenCompra[] $ordenCompras
 */
class Empleado extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'empleado';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'cedula_empleado';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['fk_cargo', 'primer_nombre_empleado', 'segundo_nombre_empleado', 'primer_apellido_empleado', 'segundo_apellido_empleado', 'fecha_nacimiento', 'salario'];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cargo()
    {
        return $this->belongsTo('App\Cargo', 'fk_cargo', 'codigo_cargo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany('App\Usuario', 'fk_empleado', 'cedula_empleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beneficios()
    {
        return $this->hasMany('App\Beneficio', 'fk_empleado', 'cedula_empleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vacacions()
    {
        return $this->hasMany('App\Vacacion', 'fk_empleado', 'cedula_empleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asistencias()
    {
        return $this->hasMany('App\Asistencium', 'fk_empleado', 'cedula_empleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarioYEmpleados()
    {
        return $this->hasMany('App\HorarioYEmpleado', 'cedula_empleado', 'cedula_empleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ofertas()
    {
        return $this->hasMany('App\Ofertum', 'fk_empleado', 'cedula_empleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Ventum', 'fk_empleado_1', 'cedula_empleado');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordenCompras()
    {
        return $this->hasMany('App\OrdenCompra', 'fk_empleado', 'cedula_empleado');
    }
}
