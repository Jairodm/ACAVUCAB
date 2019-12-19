<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_cargo
 * @property string $nombre_cargo
 * @property Empleado[] $empleados
 */
class Cargo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cargo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_cargo';

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
    protected $fillable = ['nombre_cargo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleados()
    {
        return $this->hasMany('App\Empleado', 'fk_cargo', 'codigo_cargo');
    }
}
