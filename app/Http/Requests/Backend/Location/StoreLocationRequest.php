<?php

namespace App\Http\Requests\Backend\Location;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 */
class StoreLocationRequest extends FormRequest
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
            'lat'  => 'required',
            'src_address' => 'required|max:30',
        ];
    }

  

public function messages()
{
    return [
        'lat.required' => 'Error, Add Location on Map !',
    ];
}


}
