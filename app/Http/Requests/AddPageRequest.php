<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPageRequest extends FormRequest
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
				'v_name'			=>	'required|unique:pages',
				'v_title'			=>	'required',
				'v_desc'			=>	'required',
				'i_order'			=>	'numeric'
        ];
    }
	
	public function messages()
    {
        return [
             'v_name.required' 				=> 'Please Enter Page Name.',
             'unique.required' 				=> 'Page Name already exist.',
             'v_title.required'		 		=> 'Please Enter Title.',
             'v_desc.required'		 		=> 'Please Enter Description.',
             'i_order.numeric' 				=> 'Please enter numeric number Only',
             'v_name.unique' 				=> 'Page Name already exist.',
        ];
    }
}
