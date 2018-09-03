<?php

namespace App\Http\Requests;

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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' =>'required |unique:orders',
            'dest_lat'=>'required',
            'dest_long'=>'required',
            'dest_address'=>'required',
            'user_name'=>'required',
            'phone'=>'required'
        ];
    }
}
