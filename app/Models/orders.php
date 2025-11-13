<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total', 'status', 'payment_method', 'payment_status', 'shipping_address'];

    // Un pedido pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(user::class);
    }

    // Un pedido tiene muchos items
    public function items()
    {
        return $this->hasMany(orders_items::class);
    }
}
