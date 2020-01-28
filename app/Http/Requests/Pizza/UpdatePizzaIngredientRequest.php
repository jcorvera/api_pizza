<?php

namespace App\Http\Requests\Pizza;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePizzaIngredientRequest extends FormRequest
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
        return [
            'pizza_id' => 'required|numeric|regex:[0-9]+',
            'ingredient_id' => 'required|numeric|regex:[0-9]+',
            'extra' => 'numeric|regex:[0-1]',
            'price' => 'regex:/^\d+(\.\d{1,2})?$/'
        ];
    }
}
