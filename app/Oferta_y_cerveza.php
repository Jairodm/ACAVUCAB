<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $codigo_oferta_y_cerveza
 * @property float $fk_oferta
 * @property float $fk_cerveza
 * @property Ofertum $ofertum
 * @property Cerveza $cerveza
 */
class Oferta_y_cerveza extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'oferta_y_cerveza';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_oferta_y_cerveza';

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
    protected $fillable = ['fk_oferta', 'fk_cerveza'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ofertum()
    {
        return $this->belongsTo('App\Ofertum', 'fk_oferta', 'codigo_oferta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cerveza()
    {
        return $this->belongsTo('App\Cerveza', 'fk_cerveza', 'codigo_cerveza');
    }
}
