@extends('admin/main/format')

@section('head')
    <link rel="stylesheet" href="{{asset("asset/css/Admin/Register.css")}}">
@endsection

@section('content')

    @include("admin/main/layout/Register/$page")
@endsection
