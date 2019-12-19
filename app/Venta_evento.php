<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $numero_factura_evento
 * @property string $fk_cliente
 * @property float $fk_evento
 * @property string $fecha_venta_evento
 * @property float $monto_total_evento
 * @property Cliente $cliente
 * @property Evento $evento
 * @property DetalleVentaEvento[] $detalleVentaEventos
 */
class Venta_evento extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'venta_evento';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'numero_factura_evento';

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
    protected $fillable = ['fk_cliente', 'fk_evento', 'fecha_venta_evento', 'monto_total_evento'];

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
    public function evento()
    {
        return $this->belongsTo('App\Evento', 'fk_evento', 'codigo_evento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleVentaEventos()
    {
        return $this->hasMany('App\DetalleVentaEvento', 'venta_evento', 'numero_factura_evento');
    }
}
