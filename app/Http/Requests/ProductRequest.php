<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'brand_id' => 'required|integer',
            'description' => 'nullable|string|max:1000',
            'measurement' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo "nome" é obrigatório.',
            'brand_id.required' => 'O campo "marca" é obrigatório.',
            'measurement.required' => 'O campo "medida" é obrigatório.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->productExists()) {
                $validator->errors()->add('form', 'Este produto já está cadastrado.');
            }
        });
    }
    protected function productExists()
    {
        return Product::whereRaw('LOWER(product_name) = ?', [strtolower($this->input('name'))])
            ->where('brand_id', $this->input('brand_id'))
            ->whereRaw('LOWER(product_description) = ?', [strtolower($this->input('description'))])
            ->where('product_measurement', $this->input('measurement'))
            ->where('package_id', $this->input('package'))
            ->where('id', '!=', $this->input('id')) 
            ->first();
    }
}
