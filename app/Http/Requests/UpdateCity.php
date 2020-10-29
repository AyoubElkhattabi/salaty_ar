<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCity extends FormRequest
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
            'name_ar'    =>'required|string',
            'name_en'    =>'required|string',
            'title'      =>'required|string|max:60',
            'description'=>'required|string|max:160',
            'keywords'   =>'required|string|min:100|max:255',
            'timezone'   =>'string|nullable',
            'space'      =>'integer',
            'population' =>'integer',
            'country_id'  =>'required',
            'latitude'   =>'required|numeric',
            'longitude'  =>'required|numeric'
        ];
    }
}
