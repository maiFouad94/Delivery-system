<?php

namespace App\Http\Requests\Backend\Item;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 */
class StoreItemRequest extends FormRequest
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
            'item_id'  => 'required|integer',
            'item_name'    => ['required', 'string'],
         
        ];
    }

   




}
