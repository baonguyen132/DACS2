

@extends('LoginSignUp.format')

@section('style')

<link rel="stylesheet" href="{{asset("asset/css/LoginSignUp/LoginOption.css")}}">

@endsection

@section('content')
    <div class="view">

        <div class="view1">

            <a href="{{route("home")}}"><i class='bx bx-home'></i>Home</a>
        </div>

        <div class="view2">

            <a href="{{route("admin.index")}}"><i class='bx bxs-user'></i>Admin</a>
        </div>

    </div>
@endsection
