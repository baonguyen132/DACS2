

@extends('LoginSignUp.format')

@section('style')

    <link rel="stylesheet" href="{{asset("asset/css/LoginSignUp/SignUp.css")}}">

@endsection

@section('content')

<div class="view">
    <div class="content">
        <form method="POST" action="" style="padding: 10px 20px">
            <div class="row my-3 title">
                <div class="col-sm-12">
                    <h2>
                    <b> Update Information </b>
                    </h2>
                </div>
            </div>

            <div class="row my-3 formsignup">
                <div class="col-sm-8">



                    <div class="row my-3 cid">
                        <div class="input-group">
                            <span class="input-group-text">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-telephone"
                                viewBox="0 0 16 16"
                            >
                                <path
                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"
                                />
                            </svg>
                            </span>
                            <input
                            type="tel"
                            id="cid"
                            name="cid"
                            class="form-control"
                            placeholder="Citizen ID"
                            pattern="0[0-9]{11}" ;
                            required
                            value="{{old("cid")}}"
                            />
                        </div>
                        @error('cid')
                            {{$message}}
                        @enderror
                    </div>


                    <div class="row dob-gender">
                        <div class="col-sm-7 date">
                            <div class="row" style="height:100%;">
                                <div class="titledob col-sm-5">
                                    <h6>Date of birth</h6>
                                </div>
                                <div class="col-sm-7 dob">
                                    <input
                                        type="date"
                                        name="date"
                                        id="date"
                                        class="form-control"
                                        style="text-align: center"
                                        required
                                        value="{{old("date")}}"
                                    />
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-5 gder">
                            <div class="row">
                            <div class="titlegender col-sm-6">
                                    <h6>Gender</h6>
                                </div>
                                <div class="col-sm-6 gender">
                                   <div class = "row male">
                                        <label for = "male">Male</label>
                                        <input
                                            type="radio"
                                            name="gender"
                                            value="male"
                                            class="radio"
                                            required
                                            id="male"
                                            @if ("male"==old("gender"))
                                                checked
                                            @endif
                                        />
                                   </div>
                                   <div class = "row female" >
                                        <label for = "female">Female</label>
                                        <input
                                            type="radio"
                                            name="gender"
                                            value="female"
                                            style="text-align: center"
                                            class="radio"
                                            required
                                            id="female"
                                            @if ("female"==old("gender"))
                                                checked
                                            @endif
                                        />
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>






                    <div class="row my-3 phone">
                        <div class="input-group">
                            <span class="input-group-text">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-telephone"
                                viewBox="0 0 16 16"
                            >
                                <path
                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"
                                />
                            </svg>
                            </span>
                            <input
                            type="tel"
                            id="phone"
                            name="phone"
                            class="form-control"
                            placeholder="Phone Number"
                            pattern="0[0-9]{9}" ;
                            required
                            value="{{old("phone")}}"
                            />
                        </div>
                        @error('phone')
                            {{$message}}
                        @enderror
                    </div>

                    <div class="row my-3 address">
                        <div class="input-group">
                            <span class="input-group-text">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-house"
                                viewBox="0 0 16 16"
                            >
                                <path
                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"
                                />
                            </svg>
                            </span>
                            <input
                            type="text"
                            id="address"
                            name="address"
                            class="form-control"
                            placeholder="Address"
                            required
                            value="{{old("address")}}"
                            />

                        </div>
                        @error('address')
                            {{$message}}
                        @enderror
                    </div>

                    <div class="row my-3 submit">
                        @csrf
                        <button type="submit">Sign Up</button>
                    </div>
                </div>
            </div>
        </form>



    </div>

</div>


@endsection
