<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request as Requestform;

class EditPageRequest extends FormRequest
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
    public function rules(Requestform $request)
    {
        return [
				'v_name'			=>	'required|unique:pages,v_name,'.$request->id,
				'v_title'			=>	'required',
				'v_desc'			=>	'required',
				'i_order'			=>	'numeric'
        ];
    }
	
	public function messages()
    {
        return [
             'v_name.required' 				=> 'Please Enter Page Name.',
             'v_title.required'		 		=> 'Please Enter Title.',
             'v_desc.required'		 		=> 'Please Enter Description.',
             'v_metatitle.required'		 	=> 'Please Enter Meta Title.',
             'v_metadescription.required'	=> 'Please Enter Meta Description.',
             'v_metakeyword.required'		=> 'Please Enter Meta Keyword.',
             'i_order.numeric' 				=> 'Please enter numeric number Only',
             'v_name.unique' 				=> 'Page Name already exist.',
        ];
    }
}
