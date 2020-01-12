<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_correo
 * @property string $fk_cliente
 * @property string $fk_proveedor
 * @property int $fk_contacto
 * @property string $direccion_correo
 * @property string $dominio_correo
 * @property Cliente $cliente
 * @property Proveedor $proveedor
 * @property PersonaContacto $personaContacto
 */
class Correo_electronico extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'correo_electronico';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_correo';

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['fk_cliente', 'fk_proveedor', 'fk_contacto', 'direccion_correo', 'dominio_correo'];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personaContacto()
    {
        return $this->belongsTo('App\PersonaContacto', 'fk_contacto', 'codigo_persona_contacto');
    }
}
