<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInfo extends FormRequest
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
        #name logo logostatus favicon title description keywords poweredby
        return [
            'name'       =>'required|string|min:3|max:15',
            'logo'       =>'image|mimes:jpeg,bmp,png,gif,bmp',/* size */
            'logostatus' =>'required|boolean',
            'favicon'    =>'',
            'title'      =>'required|string|max:60',
            'description'=>'required|string|max:160',
            'keywords'   =>'required|string|min:100|max:255',
            'poweredby'  =>'string|nullable',
        ];
    }
}
