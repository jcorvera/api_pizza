<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->user()->user_type === 2)
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
            'data' => 'required|array',
            'data.type' => 'required|in:orders',
            'data.attributes' => 'required|array',
            'data.attributes.order_type_id' => 'required|numeric',
            'data.attributes.payment_type_id' => 'required|numeric',
            'data.attributes.branch_office_id' => 'required|numeric',
            'data.attributes.future_order_date' => 'sometimes|date',
            'data.attributes.future_orde_hour' => 'sometimes',
            'data.relationships' => 'required|array',
            'data.relationships.delivery_address' => 'required|array',
            'data.relationships.delivery_address.city' => 'required|string',
            'data.relationships.delivery_address.suburb' => 'required|string',
            'data.relationships.delivery_address.street_or_avenue' => 'required|string',
            'data.relationships.delivery_address.house_level_appartment_number' => 'required|string|max:45',
            'data.relationships.delivery_address.points_reference' => 'required|string',
            'data.relationships.order_details' => 'required|array',
            'data.relationships.order_details.data' => 'required|array',
            'data.relationships.order_details.data.*.pizza_id' => 'required|numeric',
            'data.relationships.order_details.data.*.dough_size_id' => 'required|numeric',
            'data.relationships.order_details.data.*.toppings' => 'sometimes|required|array',
            'data.relationships.order_details.data.*.toppings.*.pizza_ingredient_id' => 'sometimes|required|numeric',
        ];
    }

}
