<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTestimonialRequest extends FormRequest
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
				'v_name'			=>	'required',
                'v_designation'		=>	'required',
                'v_photo'		    =>	'nullable | mimes:jpg,jpeg,png,JPEG,JPG,PNG |max:4096',
				'v_comment'		    =>	'required',
			
        ];
    }
	
	public function messages()
    {
        return [
             'v_name.required' 				=> 'Please Enter Name.',
             'v_designation.required'		=> 'Please Enter Designation.',
             'v_photo.mimes'		        => 'Please upload jpe,jpg,png image only.',
             'v_photo.max'		            => 'Please not upload more than max image size 4096KB.',
             'v_comment.required'		    => 'Please Enter Comment.',
          
        ];
    }
}
