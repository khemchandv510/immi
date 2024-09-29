<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KnowledgebaseRequest extends FormRequest
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
            'category' =>  'required|unique:knowledgebase_categories,category'  
        ];
    }
    public function message(){
        return[
            'required'  =>' This Feild Cannot be  Left Blank',
            'unique'  => 'This Category Already Exist'
        ];
    }
}
