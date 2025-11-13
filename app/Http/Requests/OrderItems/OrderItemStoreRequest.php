<?php

namespace App\Http\Requests\OrderItems;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderItemStoreRequest extends FormRequest
{
    /**
     * Determina si el usuario puede hacer esta solicitud
     */
    public function authorize(): bool
    {
        // Solo usuarios logueados pueden agregar items
        return Auth::check();
    }

    /**
     * Reglas de validación para crear o actualizar un item de pedido
     */
    public function rules(): array
    {
        return [
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ];
    }
}
