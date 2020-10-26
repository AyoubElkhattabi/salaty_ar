@extends('layouts.auth.index')

@section('title')LOGIN @endsection
@section('content')
<h1 class="text-center headtitle">LOGIN</h1>

        @if (session()->has('failed'))
        <div class="alert alert-danger" role="alert">{{session()->get('failed')}}</div>
        @endif

            <div class="login">
            <form method="POST" action="{{route('authenticate')}}">
        @csrf
        <div class="form-group mx-sm-3 mb-2">
            <label for="username">Username or Email Adresse</label>
            <input type="text" class="form-control" name="username">
        </div>

        <div class="form-group mx-sm-3 mb-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group mx-sm-3 mb-2">
            <input type="checkbox" name="remember_me">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>

        <div class="form-group mx-sm-3 mb-2">
            <button type="submit" class="btn btn-primary mb-2 px-5">login</button>
        </div>
    </form>
    </div>

<div class="my-2"> <a href="{{route('lostpassword')}}">Lost your password?</a></div>
<div> <a href="{{route('homepage')}}">← Return to Home Page </a></div>


@endsection

