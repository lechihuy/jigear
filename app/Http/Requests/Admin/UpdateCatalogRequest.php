<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCatalogRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:2', 'max:255', "unique:catalogs,title,{$this->catalog}"],
            'slug' => ['required', 'string', Rule::unique('slugs')->ignore($this->catalog, 'sluggable_id')],
            'parent_id' => ['nullable', 'exists:catalogs,id'],
            'published' => ['required', 'boolean'],
            'description' => ['nullable', 'string'],
            'detail' => ['nullable', 'string'],
        ];
    }
}
