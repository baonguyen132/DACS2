@extends('User.format')

@section('head')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link
    href="https://fonts.googleapis.com/css2?family=Bungee+Inline&family=Nunito+Sans:wght@400;600;700;800;900&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link rel="stylesheet" href="{{asset("asset/css/User/Cart/cart.css")}}">
<link rel="stylesheet" href="{{asset("asset/css/User/Nav.css")}}">
<link rel="stylesheet" href="{{asset("asset/css/User/Home/responsive.css")}}" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


@endsection


@section('content')

    @include('User.layout.include.menu')

    <div class="row confirm">
        <div class="form col-xl-4 col-lg-5 col-md-5 col-sm-12">
            @include('User.layout.Cart.infor')
        </div>
        <div class = "listcart col-xl-7 col-lg-7 col-md-7 col-sm-12">
            @include('User.layout.Cart.cart')
        </div>

    </div>

<script src="{{asset("asset/javascript/User/cart.js")}}"></script>
@endsection
