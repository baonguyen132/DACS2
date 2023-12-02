@extends('User.format')

@section('head')
    <link rel="stylesheet" href="{{asset("asset/css/User/Nav.css")}}">
    <link rel="stylesheet" href="{{asset("asset/css/User/Home/responsive.css")}}" />
    <link rel="stylesheet" href="{{asset("asset/css/User/menu.css")}}">
    <link rel="stylesheet" href="{{asset("asset/css/User/Exchange/$page.css")}}">
    <link rel="stylesheet" href="{{asset("asset/css/User/Exchange/Exchange.css")}}">

    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection


@section('content')

    @include('User.layout.include.menu')
    <div class="row confirm">
        <div class="form col-xl-4 col-lg-5 col-md-5 col-sm-12">
            @include('User.layout.include.infor')
        </div>
        <div class = "listcart col-xl-8 col-lg-7 col-md-7 col-sm-12">
            @include("User.layout.Exchange.$page")
        </div>

    </div>
    <script src="{{asset("asset/javascript/User/exchange.js")}}"></script>
    <script src="{{asset("asset/javascript/page.js")}}"></script>

@endsection
