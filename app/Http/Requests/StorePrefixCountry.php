<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrefixCountry extends FormRequest
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
            'language' =>'unique:App\Models\CountryPrefix,language',
            'title'=>'required|string|max:60',
            'description'=>'required|string|max:160',
            'keywords'=>'required|string|min:100|max:255',
        ];
    }
}
