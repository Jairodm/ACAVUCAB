<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_rol
 * @property string $nombre_rol
 * @property Usuario[] $usuarios
 * @property RolYPrivilegio[] $rolYPrivilegios
 */
class Rol extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'rol';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_rol';

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
    protected $fillable = ['nombre_rol'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany('App\Usuario', 'fk_rol', 'codigo_rol');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rolYPrivilegios()
    {
        return $this->hasMany('App\RolYPrivilegio', 'fk_rol', 'codigo_rol');
    }
}
