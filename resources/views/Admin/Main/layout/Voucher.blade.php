@extends('admin/main/format')

@section('head')
    <link rel="stylesheet" href="{{asset("asset/css/Admin/Voucher.css")}}">
@endsection

@section('content')

    @include("admin/main/layout/Voucher/$page")
    <script src="{{asset("asset/javascript/page.js")}}"></script>
@endsection
