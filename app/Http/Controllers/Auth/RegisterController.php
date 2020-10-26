<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StorNewUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(StorNewUser $request){

       $res = User::create([
           'email'=>$request->email ,
           'username'=>$request->username ,
           'password'=> Hash::make($request->password),
       ]);

       return redirect(route('redirect'))->with([
           'message'=> 'your account has been successfully created',
           'title'  => 'successfully created',
           'url'    => route('login')]);
    }



}
