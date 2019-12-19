<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_metodo_pago
 * @property float $fk_divisa
 * @property string $fk_cliente
 * @property float $denominacion
 * @property string $banco
 * @property string $tipo_metodo_pago
 * @property float $numero_cheque
 * @property float $numero_cuenta
 * @property float $numero_tarjeta_debito
 * @property string $tipo_tarjeta_credito
 * @property float $numero_tarjeta_credito
 * @property string $fecha_vencimiento
 * @property float $valor_punto
 * @property Divisa $divisa
 * @property Cliente $cliente
 * @property ProveedorYCuotum[] $proveedorYCuotas
 * @property Ventum[] $ventas
 * @property HistoricoValorPunto[] $historicoValorPuntos
 */
class Metodo_pago extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Metodo_pago';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_metodo_pago';

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
    protected $fillable = ['fk_divisa', 'fk_cliente', 'denominacion', 'banco', 'tipo_metodo_pago', 'numero_cheque', 'numero_cuenta', 'numero_tarjeta_debito', 'tipo_tarjeta_credito', 'numero_tarjeta_credito', 'fecha_vencimiento', 'valor_punto'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function divisa()
    {
        return $this->belongsTo('App\Divisa', 'fk_divisa', 'codigo_divisa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'fk_cliente', 'rif_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proveedorYCuotas()
    {
        return $this->hasMany('App\ProveedorYCuotum', 'fk_metodo_pago', 'codigo_metodo_pago');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Ventum', 'fk_metodo_pago', 'codigo_metodo_pago');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historicoValorPuntos()
    {
        return $this->hasMany('App\HistoricoValorPunto', 'fk_metodo_pago', 'codigo_metodo_pago');
    }
}
