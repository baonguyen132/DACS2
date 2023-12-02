

@extends('LoginSignUp.format')

@section('style')

    <link rel="stylesheet" href="{{asset("asset/css/LoginSignUp/Login.css")}}">

@endsection

@section('content')

<div class="view">
    <div class="content">
        <form  method="POST" action="{{route("login.post")}}" >
            <div class="row my-3 avata">
                <img src="{{asset("asset/image/login.png")}}">
            </div>
            <div class="row my-3 title">
                <div class="col-sm-12">
                    <h2>
                        <b>
                            Wellcome
                        </b>
                    </h2>
                </div>
            </div>
            <div class="row my-3 username">

                <div class="col-sm-8">
                    <div class="input-group">
                        <span class="input-group-text"><i class="material-icons">person</i></span>
                        <input type="email" name="gmail" required placeholder="Gmail" class="form-control" autocomplete="off" />

                    </div>
                    @error('gmail')
                        <p>{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row my-3 password">

                <div class="col-sm-8">
                    <div class="input-group">
                        <span class="input-group-text"><i class="material-icons">vpn_key</i></span>
                        <input type="password" name="passwords" required placeholder="Password" class="form-control"  autocomplete="off"/>

                    </div>
                    @error('passwords')
                        <p>{{$message}}</p>
                    @enderror
                </div>
            </div>

            @csrf

            @if (Session::has("result"))
                {{
                    Session::get("result")
                }}
            @endif

            <div class="row my-3 submit">

                <div class="col-sm-8">
                    <button type="submit" name="submitLoginAdmin">
                        Sign in
                    </button>
                </div>
            </div>
            <div class="row my-3 ForgotPass-SignUp">
                <div class="col-sm-8">
                    <div class="row">
                        <div class="forgotpass">
                            <a href="#">Forgot Password?</a>
                        </div>
                        <div class=" signup">
                            <a href="{{route("signup.index")}}">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>



    </div>

</div>

<div class="loginGmail">
    <a href="{{route("login.socialite.gmail")}}">Login gmail</a>

</div>








@endsection
