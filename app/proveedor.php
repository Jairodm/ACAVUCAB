<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $rif_proveedor
 * @property float $fk_lugar_fiscal
 * @property float $fk_lugar_fisica
 * @property string $razon_social
 * @property string $denominacion_comercial
 * @property string $direccion_fiscal
 * @property string $direccion_fisica
 * @property Lugar $lugar
 * @property Lugar $lugar
 * @property PersonaContacto[] $personaContactos
 * @property Telefono[] $telefonos
 * @property CorreoElectronico[] $correoElectronicos
 * @property ProveedorYCuotum[] $proveedorYCuotas
 * @property Usuario[] $usuarios
 * @property Cerveza[] $cervezas
 * @property OrdenCompra[] $ordenCompras
 * @property EventoYProveedor[] $eventoYProveedors
 */
class proveedor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'proveedor';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'rif_proveedor';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

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
    protected $fillable = ['fk_lugar_fiscal', 'fk_lugar_fisica', 'razon_social', 'denominacion_comercial', 'direccion_fiscal', 'direccion_fisica'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lugar()
    {
        return $this->belongsTo('App\Lugar', 'fk_lugar_fisica', 'codigo_lugar');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personaContactos()
    {
        return $this->hasMany('App\PersonaContacto', 'fk_proveedor', 'rif_proveedor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function telefonos()
    {
        return $this->hasMany('App\Telefono', 'fk_proveedor', 'rif_proveedor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function correoElectronicos()
    {
        return $this->hasMany('App\CorreoElectronico', 'fk_proveedor', 'rif_proveedor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proveedorYCuotas()
    {
        return $this->hasMany('App\ProveedorYCuotum', 'rif_proveedor', 'rif_proveedor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany('App\Usuario', 'fk_proveedor', 'rif_proveedor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cervezas()
    {
        return $this->hasMany('App\Cerveza', 'fk_proveedor', 'rif_proveedor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordenCompras()
    {
        return $this->hasMany('App\OrdenCompra', 'fk_proveedor', 'rif_proveedor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventoYProveedors()
    {
        return $this->hasMany('App\EventoYProveedor', 'fk_proveedor', 'rif_proveedor');
    }
}
