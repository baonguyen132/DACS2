@extends('admin/main/format')

@section('head')
    <link rel="stylesheet" href="{{asset("asset/css/Admin/Setting.css")}}">
@endsection

@section('content')

    @include('admin.main.layout.SettingInclude.setting')

@endsection
