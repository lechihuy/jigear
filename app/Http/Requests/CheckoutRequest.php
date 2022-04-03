<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumber;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => ['nullable', Rule::exists('users', 'id')->where(function ($query) {
                return $query->where('role', 'customer');
            })],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:0,1,2'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', new PhoneNumber],
            'payment_method' => ['required', 'in:cod,banking'],
        ];
    }
}
