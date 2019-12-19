<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_tienda
 * @property string $nombre_tienda
 * @property Ventum[] $ventas
 */
class Tienda_web extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tienda_web';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_tienda';

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
    protected $fillable = ['nombre_tienda'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Ventum', 'fk_tienda_web', 'codigo_tienda');
    }
}
