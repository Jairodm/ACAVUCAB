<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_evento_proveedor
 * @property float $fk_evento
 * @property string $fk_proveedor
 * @property Evento $evento
 * @property proveedor $proveedor
 */
class Evento_y_proveedor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'evento_y_proveedor';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_evento_proveedor';
    public $timestamps = false;

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
    protected $fillable = ['fk_evento', 'fk_proveedor'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evento()
    {
        return $this->belongsTo('App\Evento', 'fk_evento', 'codigo_evento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function casa()
    {
        return $this->belongsTo('App\proveedor', 'fk_proveedor', 'rif_proveedor');
    }
}
