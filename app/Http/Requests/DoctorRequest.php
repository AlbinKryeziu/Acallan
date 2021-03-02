<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:users',
           
            'pin'=>'required|unique:doctors',
            'specialitizy'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Please fill the name',
            'email.required'=>'Please fill the email',
            'email.unique'=>'This email used',
           
            'pin.required'=>'Please fill the  pin',
            'specialitizy.required'=>'Please fill the  specialitizy',
        ];
    }
}
