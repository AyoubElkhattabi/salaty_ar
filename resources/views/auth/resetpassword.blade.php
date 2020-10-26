@extends('layouts.auth.index')

@section('title')LOST PASSWORD @endsection
@section('content')
<h1 class="text-center headtitle">LOST PASSWORD</h1>

        @if (session()->has('failed'))
        <div class="alert alert-danger" role="alert">{{session()->get('failed')}}</div>
        @elseif(session()->has('invalidEmailOrToken'))
        <div class="alert alert-danger" role="alert">{{session()->get('invalidEmailOrToken')}}</div>
        @endif

        @error('token')
        <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror
        <div class="login">
        <form method="POST" action="{{route('password.update')}}">
            @csrf
            <input type="hidden" name="token" value="{{$token}}">
            <div class="form-group mx-sm-3 mb-2">
                <label for="email">Email Address</label>
            <input type="text" class="form-control" name="email" value="{{$email}}">
                @error('email')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group mx-sm-3 mb-2">
                <label for="password">New Password</label>
                <input type="password" class="form-control" name="password">
                @error('password')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group mx-sm-3 mb-2">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation">
                @error('password_confirmation')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>


            <div class="form-group mx-sm-3 mb-2">
            <button type="submit" class="btn btn-primary mb-2 px-5">Reset Password</button>
            </div>
        </form>
        </div>
        <div class="my-2"> <a href="#">Iogin</a></div>
        <div> <a href="#">← Return to Home Page </a></div>

@endsection

