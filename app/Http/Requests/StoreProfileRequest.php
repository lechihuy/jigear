<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth_customer();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', "unique:users,email,".auth()->user()->id],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:0,1,2'],
        ];
    }
}
