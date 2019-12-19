<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_tienda
 * @property float $fk_lugar
 * @property string $nombre_tienda
 * @property Lugar $lugar
 * @property Ventum[] $ventas
 * @property Pasillo[] $pasillos
 */
class Tienda_fisica extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tienda_fisica';

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
    protected $fillable = ['fk_lugar', 'nombre_tienda'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lugar()
    {
        return $this->belongsTo('App\Lugar', 'fk_lugar', 'codigo_lugar');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Ventum', 'fk_tienda_fisica', 'codigo_tienda');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pasillos()
    {
        return $this->hasMany('App\Pasillo', 'fk_tienda_fisica', 'codigo_tienda');
    }
}
