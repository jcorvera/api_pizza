<?php

namespace App\Http\Requests\Pizza;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePizzaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->user_type === 1)
            return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|max:200|string|unique:pizzas',
            'description' => 'required|string|min:10|string',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'url_image' => 'required|string'
        ];
        return $rules;
    }
}
