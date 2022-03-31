<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductParameterRequest extends FormRequest
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
            'key' => ['required', 'string', Rule::unique('product_parameters')
                                                ->where(fn ($query) => 
                                                    $query->where(
                                                        'product_parameter_set_id', 
                                                        $this->product_parameter_set
                                                    )
                                                ->where('id', '!=', $this->parameter))],
        ];
    }
}
