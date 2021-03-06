<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSliderRequest extends FormRequest
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
                'v_photo'		    =>	'required | mimes:jpg,jpeg,png,JPEG,JPG,PNG |max:4096',
        ];
    }
	
	public function messages()
    {
        return [
             'v_photo.required'		        => 'Please upload Photo.',
             'v_photo.mimes'		        => 'Please upload jpe,jpg,png image only.',
             'v_photo.max'		            => 'Please not upload more than max image size 4096KB.',
        ];
    }
}
