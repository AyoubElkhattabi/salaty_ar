@extends('layouts.auth.index')

@section('title')Register @endsection
@section('content')
<h1 class="text-center headtitle">SIGN UP</h1>
            <div class="login">
            <form method="POST" action="{{route('register.user')}}">
                    @csrf
                <div class="form-group mx-sm-3 mb-2">
                    <label for="email">E-mail Adresse</label>
                <input type="text" class="form-control" name="email" value="{{old('email')}}">
                    @error('email')
                <small class="form-text text-danger">{{$message}}</small>
                    @enderror

				</div>
				<div class="form-group mx-sm-3 mb-2">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="{{old('username')}}">
                    @error('username')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" value="{{old('password')}}">
                    @error('password')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
				</div>
				<div class="form-group mx-sm-3 mb-2">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}">
                    @error('password_confirmation')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group mx-sm-3 mb-2">
                <button type="submit" class="btn btn-primary mb-2 px-5">sign up</button>
                </div>
            </form>
            </div>
            <div class="my-2"> <a href="{{route('login')}}">I already have an account</a></div>
        <div> <a href="{{route('homepage')}}">← Return to Home Page </a></div>
@endsection

