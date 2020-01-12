<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
/**
 * @property float $codigo_receta
 * @property float $codigo_cerveza
 * @property float $codigo_ingrediente
 * @property float $cantidad_ingrediente
 * @property string $descripcion_receta
 * @property string $unidad_ingrediente
 * @property Cerveza $cerveza
 * @property Ingrediente $ingrediente
 */
class Receta extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'receta';
    public $timestamps = false;
    protected $primaryKey = 'codigo_receta';
    /**
     * @var array
     */
    protected $fillable = ['cantidad_ingrediente', 'descripcion_receta', 'unidad_ingrediente'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cerveza()
    {
        return $this->belongsTo('App\Cerveza', 'codigo_cerveza', 'codigo_cerveza');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ingrediente()
    {
        return $this->belongsTo('App\Ingrediente', 'codigo_ingrediente', 'codigo_ingrediente');
    }
}