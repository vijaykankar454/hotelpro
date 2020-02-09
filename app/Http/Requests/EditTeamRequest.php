<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTeamRequest extends FormRequest
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
                'v_email'		    =>	'nullable|email',
                'v_website'		    =>	'nullable|url',
                'v_photo'		    =>	'nullable|mimes:jpg,jpeg,png,JPEG,JPG,PNG |max:4096',
                'v_banner'		    =>	'nullable|mimes:jpg,jpeg,png,JPEG,JPG,PNG |max:4096',
				'v_description'		=>	'required',
				'i_order'			=>	'numeric'
        ];
    }
	
	public function messages()
    {
        return [
             'v_name.required' 				=> 'Please Enter Name.',
             'v_designation.required'		=> 'Please Enter Designation.',
             'v_photo.mimes'		        => 'Please upload jpe,jpg,png image only.',
             'v_photo.max'		            => 'Please not upload more than max image size 4096KB.',
             'v_banner.mimes'		        => 'Please upload jpe,jpg,png image only.',
             'v_banner.max'		            => 'Please not upload more than max image size 4096KB.',
             'v_description.required'		=> 'Please Enter Description.',
             'i_order.numeric' 				=> 'Please enter numeric number Only',
             'v_email.email'                => 'Plase enter Valid Email.',
             'v_website.url'                => 'Please enter Valid Website Url.'
           
        ];
    }
}
