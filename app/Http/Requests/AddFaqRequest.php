<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFaqRequest extends FormRequest
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
				'v_title'			=>	'required',
                'v_desc'		    =>	'required'
        ];
    }
	
	public function messages()
    {
        return [
             'v_title.required' 	=> 'Please Enter Title.',
             'v_desc.required'		=> 'Please Enter Content.'
        ];
    }
}
