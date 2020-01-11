<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
<<<<<<< HEAD
 * @property float $codigo_tipo_cerveza
 * @property float $fk_tipo_de_cerveza
 * @property string $nombre_tipo_cerveza
 * @property TipoDeCerveza $tipoDeCerveza
 * @property Cerveza[] $cervezas
 * @property CaracteristicaYTipoDeCerveza[] $caracteristicaYTipoDeCervezas
 * @property Comentario[] $comentarios
=======
 * @property int $codigo_tipo_cerveza
 * @property int $fk_tipo_de_cerveza
 * @property string $nombre_tipo_cerveza
 * @property string $historia
 * @property TipoDeCerveza $tipoDeCerveza
 * @property CaracteristicaYTipoDeCerveza[] $caracteristicaYTipoDeCervezas
 * @property Comentario[] $comentarios
 * @property Cerveza[] $cervezas
>>>>>>> c14f3a3cd0783e63f7facc8c7a7aa0ece3b2d474
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
<<<<<<< HEAD
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
    protected $fillable = ['fk_tipo_de_cerveza', 'nombre_tipo_cerveza'];
=======
     * @var array
     */
    protected $fillable = ['fk_tipo_de_cerveza', 'nombre_tipo_cerveza', 'historia'];
>>>>>>> c14f3a3cd0783e63f7facc8c7a7aa0ece3b2d474

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
<<<<<<< HEAD
    public function cervezas()
    {
        return $this->hasMany('App\Cerveza', 'fk_tipo_de_cerveza', 'codigo_tipo_cerveza');
=======
    public function caracteristicaYTipoDeCervezas()
    {
        return $this->hasMany('App\CaracteristicaYTipoDeCerveza', 'codigo_tipo_cerveza', 'codigo_tipo_cerveza');
>>>>>>> c14f3a3cd0783e63f7facc8c7a7aa0ece3b2d474
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
<<<<<<< HEAD
    public function caracteristicaYTipoDeCervezas()
    {
        return $this->hasMany('App\CaracteristicaYTipoDeCerveza', 'codigo_tipo_cerveza', 'codigo_tipo_cerveza');
=======
    public function comentarios()
    {
        return $this->hasMany('App\Comentario', 'fk_tipo_de_cerveza', 'codigo_tipo_cerveza');
>>>>>>> c14f3a3cd0783e63f7facc8c7a7aa0ece3b2d474
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
<<<<<<< HEAD
    public function comentarios()
    {
        return $this->hasMany('App\Comentario', 'fk_tipo_de_cerveza', 'codigo_tipo_cerveza');
=======
    public function cervezas()
    {
        return $this->hasMany('App\Cerveza', 'fk_tipo_de_cerveza', 'codigo_tipo_cerveza');
>>>>>>> c14f3a3cd0783e63f7facc8c7a7aa0ece3b2d474
    }
}
