<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_estatus
 * @property string $nombre_estatus
 * @property EstatusYVentum[] $estatusYVentas
 * @property EstatusYOrden[] $estatusYOrdens
 */
class Estatus extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'estatus';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_estatus';

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
    protected $fillable = ['nombre_estatus'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estatusYVentas()
    {
        return $this->hasMany('App\EstatusYVentum', 'estatus', 'codigo_estatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estatusYOrdens()
    {
        return $this->hasMany('App\EstatusYOrden', 'estatus', 'codigo_estatus');
    }
}
