<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestNewUser extends FormRequest
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
            'name' =>   'required|regex:/^[\pL\s\-]+$/u',
            // 'dob'  =>   'required|date',
            // 'gender'=>   'required',
            // 'email'=>'required|E-Mail',
            // 'contact'=> 'required|numeric',
            // 'contact' =>'unique:enquiries,contact',
            // 'email'  => 'unique:enquiries,email',
            'status'  =>'required',
            'note'    => 'required'
        ];
    }


    public function messages()
    {
        return [
            'required'  =>' This Feild Cannot be  Left Blank',
            'alpha'     =>'Feild Contant Should be Alphabate Only',
            'numeric'   =>'Feild Contant Should be Numeric Value Only',
            'date'  => 'Incorrect Date Format',
        ];
}

}