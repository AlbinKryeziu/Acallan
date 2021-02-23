<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiftRequest extends FormRequest
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
            'links' => 'required',
            'description' => 'required',
            'type' => 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'links.required' => 'The field must be filled',
            'links.required' => 'The field must be filled',
            'type.required' => 'The field must be filled'
        ];
    }
}
