<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnquiryDesktopRequest extends FormRequest
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
            // 'name' =>   'required|alpha',
            // 'dob'  =>   'required|date',
            // 'gender'=>   'required',
            // 'category' =>'required',
            // 'email_confirm'=>'required',
            //  'contact'=> 'required|numeric',
            //  'alternate_contact'=> 'required',
            // 'email'  => 'required|email',
            // 'address'=>  'required',
            // 'country'=>   'required',
            // 'state'  =>  'required',
            // 'city'  =>  'required',
            // 'nationality' => 'required|alpha',
            // 'image'  =>'required',
            // 'dom'   =>'required_if:marriage,==,y',
            // 'spouse_qualification'  => 'required_if:marriage,==,y',
            // 'sip'   =>'required_if:marriage,==,y',
            'term_condition'=> 'required'
        ];
    }


    public function messages()
    {
        return [
            // 'required'  =>' This Feild Cannot be  Left Blank',
            // 'alpha'     =>'Feild Contant Should be Alphabate Only',
            // 'numeric'   =>'Feild Contant Should be Numeric Value Only',
            // 'date'  => 'Incorrect Date Format',
            // 'email'  => 'Email Is Not Correct',
            // 'country.required' => 'Select Country First',
            // 'state.required' => 'Select State First',
            // 'city.required' => 'Select City',
            // 'required_if'  =>  'This Feild Cannot be  Left Blank'
            
            'term_condition.required' => 'Term And Condition Cannot Left Blank'
        ];
    }

}
