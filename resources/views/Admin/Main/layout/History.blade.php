@extends('admin/main/format')

@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{asset("asset/css/Admin/History.css")}}">
@endsection

@section('content')

    @include("admin/main/layout/History/$page")

@endsection
