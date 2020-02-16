<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNewsRequest extends FormRequest
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
                'v_short_content'	=>	'required',
                'v_desc'		    =>	'required',
                'publish_date'		=>	'required',
                'category_id'		=>	'required',
                'v_photo'		    =>	'nullable | mimes:jpg,jpeg,png,JPEG,JPG,PNG |max:4096',
                'v_banner'		    =>	'nullable | mimes:jpg,jpeg,png,JPEG,JPG,PNG |max:4096'
        ];
    }
	
	public function messages()
    {
        return [
             'v_title.required' 			=> 'Please Enter Name.',
             'v_short_content.required'		=> 'Please Enter Short Description.',
             'v_photo.mimes'		        => 'Please upload jpe,jpg,png image only.',
             'v_photo.max'		            => 'Please not upload more than max image size 4096KB.',
             'v_banner.mimes'		        => 'Please upload jpe,jpg,png image only.',
             'v_banner.max'		            => 'Please not upload more than max image size 4096KB.',
             'v_desc.required'		        => 'Please Enter Description.',
             'publish_date.required'		=> 'Please Enter Publish Date.',
             'category_id.required'		    => 'Please Select Category.'
          
           
        ];
    }
}
