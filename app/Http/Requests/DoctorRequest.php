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
            'id_doctor'=>'required|min:10|max:10|unique:doctors',
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
            'id_doctor.required'=>'Please fill the Id Doctor',
            'id_doctor.min'=>'Please must be 10 characters',
            'id_doctor.max'=>'Please should not be more than 10 characters',
            'id_doctor.unique'=>'This id exists please write another',
            'pin.required'=>'Please fill the  pin',
            'specialitizy.required'=>'Please fill the  specialitizy',
        ];
    }
}
