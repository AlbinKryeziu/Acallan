<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventAdminRequest extends FormRequest
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
           'event'=>'required',
           'start'=>'required',
           'end'=>'required',
           'product'=>'required',
           'article'=>'required',
           'doctorId' => 'required',
        ];
    }
}
