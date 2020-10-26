@extends('layouts.auth.index')

@section('title')LOST PASSWORD @endsection
@section('content')
<h1 class="text-center headtitle">LOST PASSWORD</h1>


        <div class="login my-3 lostpassword">
            <span>
                Please enter your username or email address. You will receive an email message with instructions on how to reset your password.
            </span>
        </div>
        @if (session()->has('failed'))
        <div class="alert alert-danger" role="alert">{{session()->get('failed')}}</div>
        @elseif(session()->has('message'))
        <div class="alert alert-success" role="alert">{{session()->get('message')}}</div>
        @endif
        <div class="login">
        <form method="POST" action="{{route('lostpassword.sendemail')}}">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
                <label for="username">Username or Email Address</label>
                <input type="text" class="form-control" name="username">
                @error('username')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>


            <div class="form-group mx-sm-3 mb-2">
            <button type="submit" class="btn btn-primary mb-2 px-5">Get New Password</button>
            </div>
        </form>
        </div>
        <div class="my-2"> <a href="#">Iogin</a></div>
        <div> <a href="#">← Return to Home Page </a></div>

@endsection

