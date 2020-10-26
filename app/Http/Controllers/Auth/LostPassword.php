<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\_LostPassword;
use App\Http\Requests\Auth\UpdatePassword;
use App\Mail\ResetPassword;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LostPassword extends Controller
{

    public function index(){
        return view('auth.lostpassword');
    }

    public function reset(_LostPassword $request)
    {

        $user = User::select('email','username')
        ->where('username',$request->username)
        ->orWhere('email',$request->username)
        ->limit(1)
        ->get();

        if(count($user)==0)
        return redirect()->back()->with('failed','(Username/Email) or Password incorrect');

        // get email and generate a new token
        $email =  $user[0]->email;
        $username= $user[0]->username;
        $token = Str::random(60);

        // save a row in password_resets
        $updatePassword = new PasswordReset();
        $updatePassword->email = $email;
        $updatePassword->token = $token;
        $updatePassword->save();
        //send email to user tomorrow inchaalah

        Mail::to($email)->send( new ResetPassword($username,$token,$email));
        return redirect()->back()->with('message','Check your email for the confirmation link, then visit the login page.');
    }



    public function showResetForm(Request $request){

        $token = $request->route()->parameter('token');
        $email = $request->email;

        return view('auth.resetpassword')->with([
            'token'=>$token,
            'email'=>$email,
        ]);

    }


    public function updatePassword(UpdatePassword $request){

        $check = PasswordReset::where('email',$request->email)->where('token',$request->token)->first();
        if(is_null($check)) return redirect()->back()->with('invalidEmailOrToken','invalid token or email');

        // update user
        $user = User::where('email',$request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // delete recorde of reset password
        $check->delete();

        // go login
        return redirect(route('redirect'))->with([
            'message'=> 'Your password has been reset! ',
            'title'  => 'Your password has been reset!',
            'url'    => route('login')]);
    }




}
