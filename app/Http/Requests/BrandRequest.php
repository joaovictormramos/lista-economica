<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
<<<<<<< HEAD
	$brandId = $this->id;
        return [
            'brand_name' => 'required|unique:brands,brand_name,' . $brandId
=======
        return [
            'brand_name' => 'required|unique:brands'
>>>>>>> de8416387bf0cdb0102ba5933b1dc1893152d16c
        ];
    }

    public function messages(): array
    {
        return [
            'brand_name.required' => "Insira o nome da marca.",
            'brand_name.unique' => "Esta marca já está cadastrada."
        ];
    }
}
