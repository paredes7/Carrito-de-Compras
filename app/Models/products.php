<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['name', 'description', 'price', 'stock', 'category_id'];

    // Relación con la categoría
    public function category()
    {
        return $this->belongsTo(categories::class);
    }

    // Relación con reseñas
    public function reviews()
    {
        return $this->hasMany(reviews::class);
    }

    public function orderItems(){
        return $this->hasMany(orders_items::class);
    }
}
