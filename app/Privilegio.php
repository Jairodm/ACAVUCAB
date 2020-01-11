<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_privilegio
 * @property string $nombre_privilegio
 * @property RolYPrivilegio[] $rolYPrivilegios
 */
class Privilegio extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'privilegio';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_privilegio';

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
    protected $fillable = ['nombre_privilegio'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rolYPrivilegios()
    {
        return $this->hasMany('App\RolYPrivilegio', 'fk_privilegio', 'codigo_privilegio');
    }
}
