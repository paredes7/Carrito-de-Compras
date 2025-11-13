<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderStoreRequest extends FormRequest
{
    /**
     * Determina si el usuario puede hacer esta solicitud
     */
    public function authorize(): bool
    {
        // Solo usuarios logueados pueden crear pedidos
        return Auth::check();
    }

    /**
     * Reglas de validación para crear o actualizar un pedido
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,paid,shipped,delivered,cancelled',
            'payment_method' => 'nullable|string|max:50',
            'payment_status' => 'required|string|in:unpaid,paid,refunded',
            'shipping_address' => 'nullable|string',
        ];
    }
}
