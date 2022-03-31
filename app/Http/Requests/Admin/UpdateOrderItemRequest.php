<?php

namespace App\Http\Requests\Admin;

use App\Models\OrderItem;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderItemRequest extends FormRequest
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
        $item = OrderItem::find($this->route('item'));

        return [
            'qty' => ['required', 'integer', 'min:1', 'max:' . optional($item->product)->stock + $item->qty],
        ];
    }
}
