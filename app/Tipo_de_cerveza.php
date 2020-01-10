<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_tipo_cerveza
 * @property int $fk_tipo_de_cerveza
 * @property string $nombre_tipo_cerveza
 * @property string $historia
 * @property TipoDeCerveza $tipoDeCerveza
 * @property CaracteristicaYTipoDeCerveza[] $caracteristicaYTipoDeCervezas
 * @property Comentario[] $comentarios
 * @property Cerveza[] $cervezas
 */
class Tipo_de_cerveza extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipo_de_cerveza';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_tipo_cerveza';

    /**
     * @var array
     */
    protected $fillable = ['fk_tipo_de_cerveza', 'nombre_tipo_cerveza', 'historia'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoDeCerveza()
    {
        return $this->belongsTo('App\TipoDeCerveza', 'fk_tipo_de_cerveza', 'codigo_tipo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function caracteristicaYTipoDeCervezas()
    {
        return $this->hasMany('App\CaracteristicaYTipoDeCerveza', 'codigo_tipo_cerveza', 'codigo_tipo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comentarios()
    {
        return $this->hasMany('App\Comentario', 'fk_tipo_de_cerveza', 'codigo_tipo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cervezas()
    {
        return $this->hasMany('App\Cerveza', 'fk_tipo_de_cerveza', 'codigo_tipo_cerveza');
    }
}
