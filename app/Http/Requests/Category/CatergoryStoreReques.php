<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Determina si el usuario puede hacer esta solicitud
     */
    public function authorize(): bool
    {
        // Solo usuarios logueados pueden crear categorías
        return Auth::check();
    }

    /**
     * Reglas de validación para crear o actualizar una categoría
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name,' . $this->category, // Evita duplicados
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id', // Debe existir la categoría padre
        ];
    }
}
