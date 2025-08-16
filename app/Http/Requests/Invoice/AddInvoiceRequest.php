<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddInvoiceRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        return [
            'invoice_customer' => 'required|max:255|exists:customers,id',
            'payment_method' => 'required|exists:payment_methods,id',
            'customer_amount_paid' => 'nullable',
            'group_item_product.*' => 'required|array',
            'group_item_product.*.invoice_product' => 'required|exists:products,id',
            'group_item_product.*.invoice_qty' => 'required|numeric|min:1|check_between_database:product_warehouses,id_product,invoice_product,number_in_stock',
        ];
    }
}
