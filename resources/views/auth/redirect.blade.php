@extends('layouts.auth.index')

@section('title') {{session('title')}} @endsection
@section('content')

@if (session()->has('message'))
    <div class="login">
            <span> {{session('message')}} </span>
    </div>

    <div> <a href="{{route('homepage')}}">← Return to Home Page </a></div>
@endif



    <script>
        setTimeout(function(){
           window.location.href = '{{session('url')}}';
        }, 4000);
     </script>

@endsection

