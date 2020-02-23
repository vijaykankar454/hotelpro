<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request as Requestform;

class EditSocialRequest extends FormRequest
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
            'v_data.*'		        =>	'nullable|url',
    ];
    }
	
	public function messages()
    {
        return [
           
        ];
    }
}
