<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:2', 'max:255', 'unique:products,title'],
            'slug' => ['required', 'string', 'unique:slugs,slug'],
            'sku' => ['required', 'string', 'min:2', 'max:255', 'unique:products,sku'],
            'catalog_id' => ['nullable', 'exists:catalogs,id'],
        ];
    }
}
