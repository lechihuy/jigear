<?php

namespace App\Http\Requests\Admin;

use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderItemRequest extends FormRequest
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
            'product_id' => ['required', Rule::exists('products', 'id')->where(function ($query) {
                return $query->where('stock' , '>', 0);
            })],
            'qty' => ['required', 'integer', 'min:1', 'max:' . optional(Product::find($this->product_id))->stock],
        ];
    }
}
