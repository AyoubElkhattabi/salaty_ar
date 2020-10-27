@extends('layouts.front.index')






@section('title'){{$homeInfo->title}}@endsection






@section('description'){{$homeInfo->description}}@endsection






@section('keywords'){{$homeInfo->keywords}}@endsection






@section('header')
    <header class="container-fluid">
        <h1>مواقيت الصلاة اليوم | مواعيد الصلاة اليوم</h1>
        <form>
            <div class="d-flex justify-content-center flex-column flex-md-row">
                <span class="select-area">
                    <i class="fas fa-flag icons-select"></i>
                    <select name="" id="" >
                        <option selected hidden>-- اختر دولتك --</option>
                        <option>المغرب</option>
                        <option>مصر</option>
                        <option>الجزائر</option>
                        <option>السودان</option>
                        <option>العراق</option>

                    </select>
                </span>
                <span class="select-area">
                    <i class="fas fa-city icons-select"></i>
                    <select name="" id="" disabled>
                        <option selected hidden>-- اختر مدينتك --</option>
                        <option>مراكش</option>
                        <option>الدارالبيضاء</option>
                        <option>المحمدية</option>
                        <option>فاس</option>
                        <option>الداخلة</option>
                    </select>
                </span>
            </div>
            <div class="btn-header">
                <button> <i class="fas fa-search-location icons-select ml-1"></i> بحث</button>
                <button> <i class="fas fa-map-marked-alt icons-select ml-1"></i> جد مكاني</button>
            </div>
        </form>
    </header>

@endsection











@section('breadcramb')
    <div class="container breadcramb d-none d-md-block">
        <ul class="list-breadcramb d-flex">
        <li> <a href="{{route('homepage')}}"><i class="fas fa-home iconmenu"></i> اوقات الصلاة اليوم</a></li>
        </ul>
    </div>
@endsection









@section('content')
    <div class=" d-flex justify-content-around justify-content-md-start flex-wrap align-items-start align-content-start">
        <!-- start country-->
        @forelse ($countries as $country)
            <div class="country-box">
            <img class="flag-circles" src="{{asset('storage/images/flags/'.$country->flag)}}" alt="">
                    <div class="overflow-hidden" style="height:100%; width:100%">
                    <a href="{{$country->path()}}">
                        <div class="namecountry-ar"><i class="fas fa-map-marker-alt pl-1"></i>{{$country->name_ar}}</div>
                            <div class="namecountry-en">{{$country->name_en}}<i class="fas fa-map-marker-alt"></i> </div>
                        </a>
                    </div>
            </div>
        @empty
        No Country To Show
        @endforelse
    <!-- end country-->
    </div>
@endsection









@section('pagination')
{{$countries->links('pagination::default')}}
@endsection
