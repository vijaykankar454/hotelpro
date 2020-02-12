<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddServiceRequest extends FormRequest
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
            'v_name'			        =>	'required',
            'v_short_description'		=>	'required',
            'v_desc'		            =>	'required',
            'v_icon'		            =>	'required',
            'v_photo'		            =>	'required | mimes:jpg,jpeg,png,JPEG,JPG,PNG |max:4096',
            'v_banner'		            =>	'required | mimes:jpg,jpeg,png,JPEG,JPG,PNG |max:4096',
        ];
    }
    public function messages()
    {
        return [
             'v_name.required' 				=> 'Please Enter Name.',
             'v_short_description.required'		=> 'Please Enter Short Description.',
             'v_photo.required'		        => 'Please upload Photo.',
             'v_photo.mimes'		        => 'Please upload jpe,jpg,png image only.',
             'v_photo.max'		            => 'Please not upload more than max image size 4096KB.',
             'v_banner.required'		    => 'Please upload Banner.',
             'v_banner.mimes'		        => 'Please upload jpe,jpg,png image only.',
             'v_banner.max'		            => 'Please not upload more than max image size 4096KB.',
             'v_desc.required'		        => 'Please Enter Description.',
             'v_icon.required'		        => 'Please Enter Icon.',
           
        ];
    }
}
