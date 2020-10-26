<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUser;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    /*###########################################
    | Login                                      |
    */###########################################

    public function authenticate(LoginUser $request)
    {

        if(strpos($request->username,'@')!== false) $loginBy='email'; else $loginBy='username';

            if (Auth::attempt([$loginBy => $request->username, 'password' => $request->password]))
            return redirect(route('redirect'))->with([
                'message'=> 'Wellcome '.Auth::user()->username.' .Nothing in life can make me happier than seeing you',
                'title'  => 'successfully Logged',
                'url'    => route('dashboard.index')]);

            else return redirect()->back()->with(['failed'=>'(Username/Email) or Password incorrect']);
    }




    /*###########################################
    | Logout                                     |
    */###########################################
    public function logout()
    {
        if(!Auth::check()) return redirect(route('homepage'));
        $username = Auth::user()->username;
        Auth::logout();
        return redirect(route('redirect'))->with([
            'message'=> 'GoodBye '.$username.' Have a nice day',
            'title'  => 'successfully Logout',
            'url'    => route('homepage')]);
    }





}
