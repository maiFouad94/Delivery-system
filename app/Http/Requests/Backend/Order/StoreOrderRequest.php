<?php

namespace App\Http\Requests\Backend\Order;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 */
class StoreOrderRequest extends FormRequest
{
    /**
     *
     * @return bool
     */
  public function authorize()
    {
        return $this->user()->isAdmin();
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dest_lat'  => 'required',
            'user_name'    => ['required', 'max:20'],
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'dest_address' => 'required|max:30',
            'id' => ['required', Rule::unique('orders')],
        ];
    }

    public function attributes()
{
    return[
        'id' => 'order number',
        //This will replace any instance of 'username' in validation messages with 'email'
        //'anyinput' => 'Nice Name',
    ];

}

public function messages()
{
    return [
        'dest_lat.required' => 'Error, Add Location on Map !',
        'phone.regex' => 'Error, phone id not valid',
        'id.unique' => 'Error, order number already exists',
    ];
}


}
