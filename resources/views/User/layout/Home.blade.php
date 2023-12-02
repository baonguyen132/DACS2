@extends('User.format')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{asset("asset/css/User/Home/style.css")}}" />
    <link rel="stylesheet" href="{{asset("asset/css/User/Home/responsive.css")}}" />
    <link rel="stylesheet" href="{{asset("asset/css/User/Home/BatteryMain.css")}}" />
    <link rel="stylesheet" href="{{asset("asset/css/User/Home/Development.css")}}" />
    <link rel="stylesheet" href="{{asset("asset/css/User/Home/Comment.css")}}" />
    <link rel="stylesheet" href="{{asset("asset/css/User/Home/Introduce.css")}}" />
    <link rel="stylesheet" href="{{asset("asset/css/User/Nav.css")}}" />
    <link rel="stylesheet" href="{{asset("asset/css/User/scrollToTop.css")}}" />

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" ></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" ></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js" ></script>
    <script src="https://unpkg.com/scrollreveal"></script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

@endsection

@section('content')
    @include('User.layout.Home.header')
    @include('User.layout.Home.Introduce')
    @include('User.layout.Home.BatteryMain')
    @include('User.layout.Home.Development')
    @include('User.layout.Home.Comment')
    @include('User.layout.include.footer')
@endsection
