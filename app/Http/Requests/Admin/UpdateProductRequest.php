<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:255', "unique:products,title,{$this->product}"],
            'sku' => ['required', 'string', 'min:2', 'max:255', "unique:products,sku,{$this->product}"],
            'slug' => ['required', 'string', Rule::unique('slugs')->ignore($this->product, 'sluggable_id')],
            'catalog_id' => ['nullable', 'exists:catalogs,id'],
            'unit_price' => ['nullable', 'numeric', 'min:0'],
            'stock' => ['nullable', 'integer', 'min:0'],
            'published' => ['required', 'boolean'],
            'purchasable' => ['required', 'boolean'],
            'description' => ['nullable', 'string'],
            'detail' => ['nullable', 'string'],
        ];
    }
}