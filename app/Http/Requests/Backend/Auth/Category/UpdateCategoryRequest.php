<?php

namespace App\Http\Requests\Backend\Auth\Category;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateCategoryRequest.
 */
class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-category');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:62',
        ];
    }
}
