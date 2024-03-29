<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassword extends FormRequest
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
            'email'                =>'required|email',
            'password'             =>'required|string|min:6|max:255|same:password_confirmation',
            'password_confirmation'=>'required|string|min:6|max:255'

        ];
    }
}
