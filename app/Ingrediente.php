<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_ingrediente
 * @property string $nombre_ingrediente
 * @property string $descripcion_ingrediente
 * @property Recetum[] $recetas
 */
class Ingrediente extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ingrediente';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_ingrediente';

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
    protected $fillable = ['nombre_ingrediente', 'descripcion_ingrediente'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recetas()
    {
        return $this->hasMany('App\Recetum', 'codigo_ingrediente', 'codigo_ingrediente');
    }
}
