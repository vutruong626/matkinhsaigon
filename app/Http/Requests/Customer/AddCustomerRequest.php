<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
class AddCustomerRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'last_name' => 'required|min:1|max:255',
            'first_name' => 'required|min:1|max:255',
            'email_customer' => 'required|string|email|max:255',
            'birthday' => 'nullable|date',
            'phone' => 'required|string|max:18|min:8',
            'role' => 'required|exists:roles,lever_key',
            'status' => 'required|in:deactive,active',
        ];
    }
}
