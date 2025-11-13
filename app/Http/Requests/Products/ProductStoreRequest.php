<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determina si el usuario puede hacer esta solicitud
     */
    public function authorize(): bool
    {
        // Solo usuarios logueados pueden crear productos
        return Auth::check();
    }

    /**
     * Reglas de validación para crear o actualizar un producto
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:products,name,' . $this->product,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
        ];
    }
}
