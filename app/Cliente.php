<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $rif_cliente
 * @property float $fk_lugar_fisica
 * @property float $fk_lugar_fiscal
 * @property float $cantidad_puntos
 * @property float $cedula_natural
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $denominacion_comercial
 * @property string $razon_social
 * @property string $pagina_web
 * @property string $capital_disponible
 * @property string $direccion_fiscal
 * @property string $direccion_fisica
 * @property string $tipo_cliente
 * @property Lugar $lugar
 * @property Lugar $lugar
 * @property PersonaContacto[] $personaContactos
 * @property Telefono[] $telefonos
 * @property CorreoElectronico[] $correoElectronicos
 * @property MetodoPago[] $metodoPagos
 * @property Usuario[] $usuarios
 * @property Ventum[] $ventas
 * @property VentaEntrada[] $ventaEntradas
 * @property VentaEvento[] $ventaEventos
 * @property IntercambioPunto[] $intercambioPuntos
 * @property Presupuesto[] $presupuestos
 */
class Cliente extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cliente';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'rif_cliente';
    public $timestamps = false;

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

    /**
     * @var array
     */
    protected $fillable = ['fk_lugar_fisica', 'fk_lugar_fiscal', 'cantidad_puntos', 'cedula_natural', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'denominacion_comercial', 'razon_social', 'pagina_web', 'capital_disponible', 'direccion_fiscal', 'direccion_fisica', 'tipo_cliente'];

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
        return $this->hasMany('App\PersonaContacto', 'fk_cliente', 'rif_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function telefonos()
    {
        return $this->hasMany('App\Telefono', 'fk_cliente', 'rif_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function correoElectronicos()
    {
        return $this->hasMany('App\CorreoElectronico', 'fk_cliente', 'rif_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metodoPagos()
    {
        return $this->hasMany('App\MetodoPago', 'fk_cliente', 'rif_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany('App\Usuario', 'fk_cliente', 'rif_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Ventum', 'fk_cliente', 'rif_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventaEntradas()
    {
        return $this->hasMany('App\VentaEntrada', 'fk_cliente', 'rif_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventaEventos()
    {
        return $this->hasMany('App\VentaEvento', 'fk_cliente', 'rif_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function intercambioPuntos()
    {
        return $this->hasMany('App\IntercambioPunto', 'fk_cliente', 'rif_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function presupuestos()
    {
        return $this->hasMany('App\Presupuesto', 'fk_cliente', 'rif_cliente');
    }

    public function eventos()
    {
        return $this->belongsToMany('App\Evento', 'Venta_entrada', 'fk_cliente', 'fk_evento');
    }
}
