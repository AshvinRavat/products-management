<?php

namespace App\Http\Requests;

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
        $imageRule = ['required', 'image'];

         if (request()->routeIs('product.update')) 
         {
            $imageRule = ['nullable', 'image', 'mimes:jpg,png', 'min:10', 'max:1024'];
         }  

        return [
            'name' => 'required',
            'price' => 'required',
            'image' => $imageRule
        ];
    }
}
