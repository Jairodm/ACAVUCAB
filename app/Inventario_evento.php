<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_inventario_evento
 * @property float $fk_cerveza
 * @property float $fk_venta_evento
 * @property float $cantidad_operacion
 * @property float $cantidad_disponible
 * @property string $fecha_operacion
 * @property Cerveza $cerveza
 * @property DetalleVentaEvento $detalleVentaEvento
 * @property Inventario[] $inventarios
 */
class Inventario_evento extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'inventario_evento';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_inventario_evento';

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
    protected $fillable = ['fk_cerveza', 'fk_venta_evento', 'cantidad_operacion', 'cantidad_disponible', 'fecha_operacion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cerveza()
    {
        return $this->belongsTo('App\Cerveza', 'fk_cerveza', 'codigo_cerveza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function detalleVentaEvento()
    {
        return $this->belongsTo('App\DetalleVentaEvento', 'fk_venta_evento', 'codigo_detalle_venta_evento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventarios()
    {
        return $this->hasMany('App\Inventario', 'fk_evento', 'codigo_inventario_evento');
    }
}
