<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_carrito
 * @property string $fk_cliente
 * @property int $fk_cerveza
 * @property float $cantidad
 * @property Cliente $cliente
 * @property Cerveza $cerveza
 */
class Carrito extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'carrito';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_carrito';

    /**
     * @var array
     */
    protected $fillable = ['fk_cliente', 'fk_cerveza', 'cantidad'];

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
    public function cerveza()
    {
        return $this->belongsTo('App\Cerveza', 'fk_cerveza', 'codigo_cerveza');
    }
}
