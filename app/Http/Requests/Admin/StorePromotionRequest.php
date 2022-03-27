<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->isAdmin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'type' => ['required', 'string', 'in:voucher,sale_off'],
            'value' => ['required', 'numeric', 'min:0'],
            'init_uses' => ['required', 'numeric', 'min:1'],
            'is_percent_unit' => ['required', 'boolean'],
            'started_at' => ['required', 'date'],
            'ended_at' => ['nullable', 'date'],
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->sometimes('value', 'max:100', function($input) {
            return $input->is_percent_unit;
        });
    }
}
