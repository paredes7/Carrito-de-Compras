<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders_items extends Model
{
       use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    // Cada item pertenece a un pedido
    public function order()
    {
        return $this->belongsTo(orders::class);
    }

    // Cada item pertenece a un producto
    public function product()
    {
        return $this->belongsTo(products::class);
    }
}
