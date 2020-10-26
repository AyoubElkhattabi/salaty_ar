<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StorNewUser extends FormRequest
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
            'email'   =>'required|email|max:255|unique:App\Models\User,email',
            'username'=>'required|min:3|max:15|alpha_num|unique:App\Models\User,username',
            'password'=>'required|min:6|max:255|same:password_confirmation',
        ];
    }
}
