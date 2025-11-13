<?php

namespace App\Http\Requests\Users;

//use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


//StoreRequest importamos al controlador de contactos
class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 
     * 
     * Una validacion para saber si el usuario esta logueado o no
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     * 
     * Apartado de reglas aqui añadimos nuestras reglas
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return ([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|string|min:6|confirmed', // si hay confirmación de contraseña
            'role' => 'in:customer,admin',
            'phone' => 'nullable|string|max:20',
        ]);
    }
}
