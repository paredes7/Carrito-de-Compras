<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'parent_id'];

    // Una categoría puede tener muchos productos
    public function products()
    {
        return $this->hasMany(products::class);
    }

    // Una categoría puede tener subcategorías (self reference)
    public function children()
    {
        return $this->hasMany(categories::class, 'parent_id');
    }

    // Una categoría puede pertenecer a una categoría padre
    public function parent()
    {
        return $this->belongsTo(categories::class, 'parent_id');
    }
}
