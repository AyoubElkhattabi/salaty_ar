@extends('layouts.front.index')






@section('title'){{$city->title}}@endsection






@section('description'){{$city->descriptio}}@endsection






@section('keywords'){{$city->keywords}}@endsection






@section('header')
<header class="container-fluid">
    <h1>{{$city->title}}</h1>
    <h2>{{$city->description}}</h2>
</header>
@endsection











@section('breadcramb')
    <div class="container breadcramb d-none d-md-block">
        <ul class="list-breadcramb d-flex">
        <li> <a href="{{route('homepage')}}"><i class="fas fa-home iconmenu"></i> اوقات الصلاة اليوم</a></li>
        <li>\</li>
        <li><a href="{{route('country',$city->country->id)}}">{{$city->country->name_ar}}</a></li>
        <li>\</li>
        <li>{{$city->name_ar}}</li>
        </ul>
    </div>
@endsection









@section('content')



    <div class="row align-items-start">

        <div class="dateinfo col-12 col-md-6">
            <div class="box-shadow" style="color: white;">
            <div class="datainfo-row"> <i class="fas fa-city"></i> <span>المدينة : </span> <span>{{$city->name_ar}}</span></div>
                <div class="datainfo-row"> <i class="fas fa-flag"></i> <span>الدولة : </span> <span>{{$city->country->name_ar}}</span></div>
                {{--<div class="datainfo-row"> <i class="fas fa-hourglass-half"></i> <span>المنطقة الزمنية : </span> <span>GMT {{$city->timezone}}</span></div>--}}
                <div class="datainfo-row"> <i class="far fa-clock"></i> <span>الساعة الان  : </span> <span>{{date("A h:i:s")}}</span> </div>
                <div class="datainfo-row"> <i class="fas fa-calendar-alt"></i> <span>التاريخ الميلادي  : </span> <span>{{date("d/m/Y")}}</span></div>
                {{--<div class="datainfo-row"> <i class="fas fa-calendar-alt"></i> <span>التاريخ الهجري : </span> <span><span>1442</span> صفر <span>15</span> الجمعة </span></div>--}}
            </div>
        </div>

        <div class="nextpray col-12 col-md-6 d-flex justify-content-center align-items-center">
            <div class="box-shadow">
                <div class="nextpray-whitebox" style="border-radius: 7px 7px 0px 0px !important;"> الصلاة القادمة هي صلاة <span class="nextpray-name">
                     @if    ($prayersInfo->nextPrayer == 'Fajr') الفجر
                     @elseif($prayersInfo->nextPrayer == 'Dhuhr') الضهر
                     @elseif($prayersInfo->nextPrayer == 'Asr') العصر
                     @elseif($prayersInfo->nextPrayer == 'Maghrib') المغرب
                     @elseif($prayersInfo->nextPrayer == 'Isha') العشاء
                     @endif
                    </span> </div>
                <div style=" font-size: 20px;">
                    <div class="color-white">المدة المتبقية</div>
                    <div class="nextpray-whitebox digital nextpray-time">{{$prayersInfo->remaineTime}}</div>
                   {{--<div class="color-white">عشرون دقيقة و ثلاتة و عشرون ثانية </div>--}}
                </div>
            </div>
        </div>

    </div>



    <div class="praying-planning box-shadow pr-3 pr-md-0">
        <div class="row justify-content-around flex-column flex-md-row ">

            <div class="d-flex flex-row flex-md-column col-12 col-md-2 align-items-center @if($prayersInfo->nextPrayer == 'Fajr')nextPrayerActiv @endif">
                <div class="p-2 nameoftime"> <div><i class="far fa-moon"></i></div> <div>الفجر</div></div>
                <div class="p-2 digital" >{{ $prayersInfo->prayerTimes['Fajr']}}</div>
            </div>

            <div class="d-flex flex-row flex-md-column col-12 col-md-2 align-items-center @if($prayersInfo->nextPrayer == 'Sunrise')nextPrayerActiv @endif">
                <div class="p-2 nameoftime"> <div><i class="fas fa-cloud-sun"></i></div> <div>الشروق</div></div>
                <div class="p-2 digital" >{{$prayersInfo->prayerTimes['Sunrise']}}</div>
            </div>

            <div class="d-flex flex-row flex-md-column col-12 col-md-2 align-items-center @if($prayersInfo->nextPrayer == 'Dhuhr')nextPrayerActiv @endif">
                <div class="p-2 nameoftime"> <div><i class="fas fa-sun"></i></div> <div>الظهر</div></div>
                <div class="p-2 digital" >{{$prayersInfo->prayerTimes['Dhuhr']}}</div>
            </div>

            <div class="d-flex flex-row flex-md-column col-12 col-md-2 align-items-center @if($prayersInfo->nextPrayer == 'Asr')nextPrayerActiv @endif">
                <div class="p-2 nameoftime"> <div><i class="far fa-sun"></i></div> <div>العصر</div></div>
                <div class="p-2 digital" >{{$prayersInfo->prayerTimes['Asr']}}</div>
            </div>

            <div class="d-flex flex-row flex-md-column col-12 col-md-2 align-items-center @if($prayersInfo->nextPrayer == 'Maghrib')nextPrayerActiv @endif">
                <div class="p-2 nameoftime"> <div><i class="fas fa-cloud-sun"></i></div> <div>المغرب</div></div>
                <div class="p-2 digital" >{{$prayersInfo->prayerTimes['Maghrib']}}</div>
            </div>

            <div class="d-flex flex-row flex-md-column col-12 col-md-2 align-items-center @if($prayersInfo->nextPrayer == 'Isha')nextPrayerActiv @endif">
                <div class="p-2 nameoftime"> <div><i class="fas fa-moon"></i></div> <div>العشاء</div></div>
                <div class="p-2 digital" >{{$prayersInfo->prayerTimes['Isha']}}</div>
            </div>
        </div>

    </div>






    <div class="info-city row">
        <div class="dateinfo col-12">
            <div class="box-shadow" style="color: white;">
                <div class="datainfo-row info-of-city"> <i class="fas fa-info-circle"></i>  معلومات عن مدينة {{$city->name_ar}}</div>
                    <div class="datainfo-row info-of-city-data"> <span>إحداثيات  : </span> <span style="display: inline-block;direction: ltr;">{{$city->latitude}}° N , {{$city->longitude}}° W</span></div>
                    <div class="datainfo-row info-of-city-data"> <span>المساحة : </span> <span> {{$city->space}} كم²</span></div>
                    <div class="datainfo-row info-of-city-data"> <span>التعداد السكاني : </span> <span>{{$city->population}} نسمة </span></div>
                    <div class="datainfo-row info-of-city-data"> <span>التوقيت المعتمد  : </span> <span>GMT {{$city->timezone}}</span></div>
                    <div class="datainfo-row info-of-city-data border-radius-bottom"> <span> طريقة الحساب : </span>
                        <span>
                            @switch($city->country->calcmethod)
                                    @case('Egypt')Egyptian General Authority of Survey @break
                                    @case('ISNA')Islamic Society of North America (ISNA) @break
                                    @case('Makkah')Umm al-Qura University, Makkah @break
                                    @case('Karachi')University of Islamic Sciences, Karachi @break
                                    @case('Jafari')Shia Ithna-Ashari (Jafari) @break
                                    @case('Tehran')Institute of Geophysics, University of Tehran @break
                                @default Muslim World League (MWL) @endswitch
                        </span>
                    </div>
            </div>
        </div>
    </div>



@endsection








@section('pagination')
{{--$cities->links('pagination::default')--}}
@endsection
