<?php
//para menejar registro y login
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class user extends Authenticatable //es loque permite que laravel autentique
{
    use HasFactory, Notifiable, HasApiTokens;

    //datos que se validaran
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone'
    ];

    //campos que se pueden asignar masivamente
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //casting de campos
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //para encryptar las contraseñas
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    //Relaciones
    // Un usuario puede tener muchos pedidos
    public function orders()
    {
        return $this->hasMany(orders::class);
    }

    // Un usuario puede hacer muchas reseñas
    public function reviews()
    {
        return $this->hasMany(reviews::class);
    }
}
