<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;
class UpdateWarehouseRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        
        return [
            'warehouse_brand' => 'required|exists:brands,id',
            'warehouse_qty.*' => 'numeric|nullable',

            // 'invoice_code' => 'exists:invoices,invoice_code',
            // 'invoice_created' => 'required',
            // 'staff_buy' => 'string|email|max:255|exists:customers,email_customer',
            // 'payment_method' => 'exists:payment_methods,id',
            // 'group-item-product.*.invoice_product' => 'required|exists:products,id',
        ];
    }
}
