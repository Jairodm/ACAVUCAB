<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $numero_factura
 * @property string $fk_empleado_1
 * @property string $fk_empleado_2
 * @property string $fk_cliente
 * @property float $fk_metodo_pago
 * @property float $fk_tienda_web
 * @property float $fk_tienda_fisica
 * @property string $fecha_venta
 * @property float $monto_total_venta
 * @property Empleado $empleado
 * @property Empleado $empleado
 * @property Cliente $cliente
 * @property MetodoPago $metodoPago
 * @property TiendaFisica $tiendaFisica
 * @property TiendaWeb $tiendaWeb
 * @property EstatusYVentum[] $estatusYVentas
 * @property IntercambioPunto[] $intercambioPuntos
 * @property DetalleVentum[] $detalleVentas
 */
class Venta extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'venta';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'numero_factura';

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
    protected $fillable = ['fk_empleado_1', 'fk_empleado_2', 'fk_cliente', 'fk_metodo_pago', 'fk_tienda_web', 'fk_tienda_fisica', 'fecha_venta', 'monto_total_venta'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleado()
    {
        return $this->belongsTo('App\Empleado', 'fk_empleado_1', 'cedula_empleado');
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
    public function metodoPago()
    {
        return $this->belongsTo('App\Metodo_pago', 'fk_metodo_pago', 'codigo_metodo_pago');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiendaFisica()
    {
        return $this->belongsTo('App\TiendaFisica', 'fk_tienda_fisica', 'codigo_tienda');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiendaWeb()
    {
        return $this->belongsTo('App\TiendaWeb', 'fk_tienda_web', 'codigo_tienda');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estatusYVentas()
    {
        return $this->hasMany('App\EstatusYVentum', 'venta', 'numero_factura');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function intercambioPuntos()
    {
        return $this->hasMany('App\IntercambioPunto', 'fk_venta', 'numero_factura');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleVentas()
    {
        return $this->hasMany('App\Detalle_venta', 'venta', 'numero_factura');
    }
}
