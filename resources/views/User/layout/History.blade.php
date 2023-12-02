@extends('User.format')

@section('head')



<link rel="stylesheet" href="{{asset("asset/css/User/Nav.css")}}">
<link rel="stylesheet" href="{{asset("asset/css/User/Home/responsive.css")}}" />
<link rel="stylesheet" href="{{asset("asset/css/User/History/introduce.css")}}">
<link rel="stylesheet" href="{{asset("asset/css/User/History/grid.css")}}">
<link rel="stylesheet" href="{{asset("asset/css/User/History/responesive.css")}}">
<link rel="stylesheet" href="{{asset("asset/css/User/History/history.css")}}">
<link rel="stylesheet" href="{{asset("asset/css/User/History/detail.css")}}">

    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endsection


@section('content')

    @include('User.layout.include.menu')

    @include('User.layout.History.introduce')
    @include("User.layout.History.$page")

    <script src="{{asset("asset/javascript/User/history.js")}}"></script>

@endsection
