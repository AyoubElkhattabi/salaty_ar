<!DOCTYPE html>
<html  lang="ar">
<head>
    <!--Start Seo Tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" >
    <meta name="keywords" content="@yield('keywords')" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="home" href="{{ URL::to('/') }}" />
    <meta name="theme-color" content="#627E8C">
    <meta name="robots" content="all">
    <meta content="https://www.facebook.com/ayoub.elkhaddari.948" property="fb:profile_id">
    <meta name="google-site-verification" content="">
    <link href="{{URL::current()}}" rel="canonical">
    <meta name="referrer" content="no-referrer-when-downgrade">
    <!-- facebook seo -->
    <meta content="ar_AR" property="og:locale">
    <meta content="Name of your web site " property="og:site_name">
    <meta content="website" property="og:type">
    <meta content="{{URL::current()}}" property="og:url">
    <meta content="@yield('title')" property="og:title">
    <meta content="@yield('description')" property="og:description">
    <meta content="" property="og:image">
    <meta content="1200" property="og:image:width">
    <meta content="630" property="og:image:height">
    <!-- twitter seo -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@Moz">
    <meta name="twitter:creator" content="@Moz">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="">
    <meta name="twitter:image:width" content="800">
    <meta name="twitter:image:height" content="418">
<!--End Seo Tags-->
    {{--Start Css Files--}}
        {{--bootstrao css--}}
            <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        {{--My Style--}}
            <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        {{--Font Awsome--}}
            <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    {{--End Css Files--}}
</head>
<body>
    {{--start navbar--}}
    @include('layouts.front.includes.navbar')
    {{--end navbar--}}
    <div class="main" id="main">
        {{-- Start Header --}}
        @yield('header')
        {{-- End Header --}}
        <div class="border-circles"></div>
        {{-- Begin BreadCramb --}}
            @yield('breadcramb')
        {{-- End BreadCramb --}}


        <div class="content container">

            {{--Start Content--}}
            @yield('content')
             {{--end Content--}}

        </div>


            {{--Strat Pagination--}}
            @yield('pagination')
            {{--End Pagination--}}


                {{-- Start Footer --}}
                @include('layouts.front.includes.footer')
               {{--End Footer--}}





    </div> {{--end main--}}
















    {{--Start JavaScript Files--}}
        {{--jquery--}}
        <script src="{{asset('assets/js/jquery2.min.js')}}"></script>
        {{--popperjs--}}
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        {{--bootstrap js--}}
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        {{--My Javacript Code--}}
        <script src="{{asset('assets/js/javascript.js')}}"></script>
        {{--Font Awsome--}}
    {{--End JavaScript Files--}}

</body>
</html>





