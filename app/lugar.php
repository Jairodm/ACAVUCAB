<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_lugar
 * @property float $fk_lugar
 * @property string $nombre_lugar
 * @property string $tipo_lugar
 * @property Lugar $lugar
 * @property Proveedor[] $proveedors
 * @property Proveedor[] $proveedors
 * @property Cliente[] $clientes
 * @property Cliente[] $clientes
 * @property TiendaFisica[] $tiendaFisicas
 * @property Evento[] $eventos
 */
class lugar extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'lugar';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_lugar';

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
    protected $fillable = ['fk_lugar', 'nombre_lugar', 'tipo_lugar'];

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
    public function proveedors()
    {
        return $this->hasMany('App\Proveedor', 'fk_lugar_fisica', 'codigo_lugar');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tiendaFisicas()
    {
        return $this->hasMany('App\TiendaFisica', 'fk_lugar', 'codigo_lugar');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventos()
    {
        return $this->hasMany('App\Evento', 'fk_lugar', 'codigo_lugar');
    }
}
