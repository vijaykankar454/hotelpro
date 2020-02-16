<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPackageRequest extends FormRequest
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
                'v_desc'		    =>	'required',
                'tour_start_date'	=>	'required',
                'tour_end_date'		=>	'required',
                'last_book_date'	=>	'required',
                'v_price'	        =>	'required',
                'v_photo'		    =>	'required | mimes:jpg,jpeg,png,JPEG,JPG,PNG |max:4096',
                'v_banner'		    =>	'required | mimes:jpg,jpeg,png,JPEG,JPG,PNG |max:4096',
                'destination_id'	=>	'required',
                'photos.*'		    =>	'required|image|mimes:jpg,jpeg,png,JPEG,JPG,PNG |max:4096',
        ];
    }
	
	public function messages()
    {
        return [
             'v_name.required' 				=> 'Please Enter Name.',
             'v_photo.required'		        => 'Please upload Photo.',
             'v_photo.mimes'		        => 'Please upload jpe,jpg,png image only.',
             'v_photo.max'		            => 'Please not upload more than max image size 4096KB.',
             'v_banner.required'		    => 'Please upload Banner.',
             'v_banner.mimes'		        => 'Please upload jpe,jpg,png image only.',
             'v_banner.max'		            => 'Please not upload more than max image size 4096KB.',
             'v_desc.required'		        => 'Please Enter Description.',
             'tour_start_date.required'		=> 'Please Select Tour Start date.',
             'tour_end_date.required'		=> 'Please Select Tour End date.',
             'last_book_date.required'		=> 'Please Select booking date.',
             'destination_id.required'		 => 'Please Select Destination.',
             'v_price.required'             => 'Please Enter Price(per Person).',
            
        ];
    }
}
