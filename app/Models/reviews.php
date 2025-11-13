<?php
//Con estas relaciones ya puedes hacer consultas complejas fácilmente, por ejemplo:
/** Obtener todos los pedidos de un usuario con productos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'user_id', 'rating', 'comment'];

    // Una reseña pertenece a un producto
    public function product()
    {
        return $this->belongsTo(products::class);
    }

    // Una reseña pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
