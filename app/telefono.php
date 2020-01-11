<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_telefono
 * @property string $fk_proveedor
 * @property string $fk_cliente
 * @property float $fk_contacto
 * @property float $codigo_area
 * @property float $numero
 * @property Proveedor $proveedor
 * @property Cliente $cliente
 * @property PersonaContacto $personaContacto
 */
class telefono extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'telefono';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_telefono';

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
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['fk_proveedor', 'fk_cliente', 'fk_contacto', 'codigo_area', 'numero'];

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
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'fk_cliente', 'rif_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personaContacto()
    {
        return $this->belongsTo('App\PersonaContacto', 'fk_contacto', 'codigo_persona_contacto');
    }
}
