<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_rol_privilegio
 * @property float $fk_rol
 * @property float $fk_privilegio
 * @property Rol $rol
 * @property Privilegio $privilegio
 */
class Rol_y_Privilegio extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'rol_y_privilegio';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_rol_privilegio';

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
    protected $fillable = ['fk_rol', 'fk_privilegio'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this->belongsTo('App\Rol', 'fk_rol', 'codigo_rol');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function privilegio()
    {
        return $this->belongsTo('App\Privilegio', 'fk_privilegio', 'codigo_privilegio');
    }
}
