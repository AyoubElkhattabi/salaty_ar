<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCountry extends FormRequest
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
                    'name_ar'=>'required|string|min:3',
                    'name_en'=>'required|string|min:3',
                    'title'=>'required|string|max:60',
                    'description'=>'required|string|max:160',
                    'keywords'=>'required|string|min:100|max:255',
                    'flag'=>'required|image|mimes:jpeg,bmp,png,gif,bmp',
                    'slug'=>'',
                    'timezone'=>'required',
                    'calcmethod'=>'required'
        ];
    }
}
