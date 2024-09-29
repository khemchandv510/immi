<?php
namespace App\Http\Requests;
use App\Http\Requests\Requests;
class Enquiryrequest extends Request
{
    public function authorize(){
        return true;

    }
    public function rules(){
        return [
            'name' =>   'required|alpha',
            'dob'  =>   'required|date',
            'contact'=> 'required|numeric',
            'email'  => 'required|email',
            'address'=>  'required',
            'country'=>   'required',
            'state'  =>  'required',
            'city'  =>  'required',
            'nationality' => 'required|alpha',
            'image'  =>'required',
            'interested_intake' =>'required'
            // 'marriage'  => 'required_if'
        ];
         
    } 
    public function messages()
    {
        return [
            'required'  =>' Feild Cannot be  Left Blank',
            'alpha'     =>'Feild Contant Should be Alphabate Only',
            'numeric'   =>'Feild Contant Should be Numeric Value Only',
            'date'  => 'Incorrect Date Format',
            'email'  => 'Email Is Not Correct',
            'country.required' => 'Select Country'

        ];
    }
}