<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
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
            'name' => 'required|string|unique:restaurant,name,'.$this->restaurant->id.'|max:100',
            'address' => 'required|string|max:100',
            'stars' => 'required|numeric|min:0|max:5',
            'price' => 'required|numeric|min:0',
            'img' => 'required|string|max:100',
            'description' => 'required|string|max:300', 
        ];
    }
}
