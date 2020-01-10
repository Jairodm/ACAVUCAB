<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_cerveza
 * @property int $fk_tipo_de_cerveza
 * @property string $fk_proveedor
 * @property string $nombre_cerveza
 * @property string $imagen_cerveza
 * @property float $precio
 * @property TipoDeCerveza $tipoDeCerveza
 * @property Proveedor $proveedor
 * @property Ofertum[] $ofertas
 * @property OfertaYCerveza[] $ofertaYCervezas
 * @property Recetum[] $recetas
 * @property DetallePresupuesto[] $detallePresupuestos
 * @property DetalleVentaEvento[] $detalleVentaEventos
 * @property DetalleVentum[] $detalleVentas
 * @property DetalleCompra[] $detalleCompras
 * @property InventarioEvento[] $inventarioEventos
 * @property Inventario[] $inventarios
 * @property Carrito[] $carritos
 */
class Cerveza extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cerveza';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_cerveza';
    public $timestamps=false;

    /**
     * @var array
     */
    protected $fillable = ['fk_tipo_de_cerveza', 'fk_proveedor', 'nombre_cerveza', 'imagen_cerveza', 'precio'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoDeCerveza()
    {
        return $this->belongsTo('App\TipoDeCerveza', 'fk_tipo_de_cerveza', 'codigo_tipo_cerveza');
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
    public function ofertas()
    {
        return $this->hasMany('App\Ofertum', 'fk_cerveza', 'codigo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ofertaYCervezas()
    {
        return $this->hasMany('App\OfertaYCerveza', 'fk_cerveza', 'codigo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recetas()
    {
        return $this->hasMany('App\Recetum', 'codigo_cerveza', 'codigo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallePresupuestos()
    {
        return $this->hasMany('App\DetallePresupuesto', 'fk_cerveza', 'codigo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleVentaEventos()
    {
        return $this->hasMany('App\DetalleVentaEvento', 'cerveza', 'codigo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleVentas()
    {
        return $this->hasMany('App\DetalleVentum', 'cerveza', 'codigo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleCompras()
    {
        return $this->hasMany('App\DetalleCompra', 'cerveza', 'codigo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventarioEventos()
    {
        return $this->hasMany('App\InventarioEvento', 'fk_cerveza', 'codigo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventarios()
    {
        return $this->hasMany('App\Inventario', 'fk_cerveza', 'codigo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carritos()
    {
        return $this->hasMany('App\Carrito', 'fk_cerveza', 'codigo_cerveza');
    }
}
