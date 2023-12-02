@extends('User.format')

@section('head')
    <link rel="stylesheet" href="{{asset("asset/css/User/Nav.css")}}">
    <link rel="stylesheet" href="{{asset("asset/css/User/Home/responsive.css")}}" />
    <link rel="stylesheet" href="{{asset("asset/css/User/menu.css")}}">
    <link rel="stylesheet" href="{{asset("asset/css/User/Information/information.css")}}">

    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endsection


@section('content')

    @include('User.layout.include.menu')
    <div class="row confirm">
        <div class="form col-xl-4 col-lg-5 col-md-5 col-sm-12">
            @include('User.layout.include.infor')
        </div>
        <div class = "listcart col-xl-7 col-lg-7 col-md-7 col-sm-12">
            <h3 class="mb-3">Chỉnh sửa thông tin</h3>
            <form action="{{route("information.update")}}"  method="POST">
                <div class="form-floating mb-3">
                    <input type="text" name="fname" placeholder="Họ tên" required value="{{$user->name}}" id="fname" class="form-control">
                    <label for="fname">Họ tên</label>

                </div>
                <div class="form-floating mb-3">
                    <input type="date" name="dob" placeholder="Ngày sinh" required value="{{$user->dob}}" class="form-control" id="dob">
                    <label for="dob">Ngày sinh</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="pob" placeholder="Ngày sinh" required value="{{$user->pob}}" class="form-control" id="pob">
                    <label for="pob">Nơi sinh</label>
                </div>
                <div class="form-floating mb-3">
                    <div class="row gender">
                        <h4 class="mb-3">Giới tính</h4>
                        <div class="" style="float: left;">
                            <label for="male">Nam</label>
                            <input type="radio" name="gender_information" @if ($user->gender == "Male") checked @endif  value="Male" required id="male" >
                            <label for="female">Nữ</label>
                            <input type="radio" name="gender_information"  @if ($user->gender == "Female") checked @endif  value="Female" required id="female" >
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="address" placeholder="Ngày sinh" required value="{{$user->address}}" class="form-control" id="address">
                    <label for="address">Địa chỉ</label>
                </div>
                @csrf
                <button type="submit" class="update">Cập nhật</button>


            </form>
        </div>

    </div>

@endsection
