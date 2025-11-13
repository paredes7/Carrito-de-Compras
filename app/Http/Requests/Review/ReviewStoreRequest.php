<?php

namespace App\Http\Requests\Review;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ReviewStoreRequest extends FormRequest
{
    /**
     * Determina si el usuario puede hacer esta solicitud
     */
    public function authorize(): bool
    {
        // Solo usuarios logueados pueden crear reseñas
        return Auth::check();
    }

    /**
     * Reglas de validación para crear o actualizar una reseña
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ];
    }
}
