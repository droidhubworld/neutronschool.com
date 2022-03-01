<?php

namespace App\Http\Requests\Trainer\Address;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'address1'       => 'required|string|min:3|max:120',
            'city'         => 'required|string|min:3|max:60',
            'state'        => 'nullable|string|min:2|max:60',
            'post_code'    => 'required|min:4|max:10|AlphaDash',
            'country_id'   => 'required|string|min:2|max:3',
        ];
    }
}
