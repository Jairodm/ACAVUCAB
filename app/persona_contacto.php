<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_persona_contacto
 * @property string $fk_cliente
 * @property string $fk_proveedor
 * @property string $nombre_contacto
 * @property string $apellido_contacto
 * @property Cliente $cliente
 * @property Proveedor $proveedor
 * @property Telefono[] $telefonos
 * @property CorreoElectronico[] $correoElectronicos
 */
class persona_contacto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'persona_contacto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_persona_contacto';

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
    protected $fillable = ['fk_cliente', 'fk_proveedor', 'nombre_contacto', 'apellido_contacto'];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'fk_cliente', 'rif_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor', 'fk_proveedor', 'rif_proveedor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function telefonos()
    {
        return $this->hasMany('App\Telefono', 'fk_contacto', 'codigo_persona_contacto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function correoElectronicos()
    {
        return $this->hasMany('App\CorreoElectronico', 'fk_contacto', 'codigo_persona_contacto');
    }
}
