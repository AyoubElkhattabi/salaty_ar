@extends('layouts.front.index')






@section('title'){{$country->title}}@endsection






@section('description'){{$country->description}}@endsection






@section('keywords'){{$country->keywords}}@endsection






@section('header')
<header class="container-fluid">
    <h1>{{$country->title}}</h1>
    <h2>{{$country->description}}</h2>
</header>
@endsection











@section('breadcramb')
    <div class="container breadcramb d-none d-md-block">
        <ul class="list-breadcramb d-flex">
        <li> <a href="{{route('homepage')}}"><i class="fas fa-home iconmenu"></i> اوقات الصلاة اليوم</a></li>
        <li>\</li>
        <li><input type="image" src="{{asset('storage/images/flags/'.$country->flag)}}" alt="" style="width:20px;height:15px;"> {{$country->name_ar}}</li>
        </ul>
    </div>
@endsection









@section('content')
    <div class=" d-flex justify-content-around justify-content-md-start flex-wrap align-items-start align-content-start">
        <!-- start country-->
        @forelse ($cities as $city)
    <a href="{{route('city',$city->id)}}" class="city-box"> <i class="fas fa-map-marker-alt pl-1"></i>{{$city->name_ar}}</a>
        @empty
        No city To Show
        @endforelse
    <!-- end country-->
    </div>
@endsection








@section('pagination')
{{$cities->links('pagination::default')}}
@endsection
