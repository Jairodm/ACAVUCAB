<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_pasillo
 * @property float $fk_tienda_fisica
 * @property string $nomber_pasillo
 * @property TiendaFisica $tiendaFisica
 * @property Anaquel[] $anaquels
 */
class Pasillo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pasillo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_pasillo';

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
    protected $fillable = ['fk_tienda_fisica', 'nomber_pasillo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiendaFisica()
    {
        return $this->belongsTo('App\TiendaFisica', 'fk_tienda_fisica', 'codigo_tienda');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function anaquels()
    {
        return $this->hasMany('App\Anaquel', 'fk_pasillo', 'codigo_pasillo');
    }
}
