

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
                    <b> Sign Up </b>
                    </h2>
                </div>
            </div>

            <div class="row my-3 formsignup">
                <div class="col-sm-8">
                    <div class="my-3">
                        <div class="input-group" style="justify-content: space-between">
                            <span class="border-input-right">
                            <input
                                type="text"
                                name="firstname"
                                id="fn"
                                placeholder="First Name"
                                class="form-control"
                                required
                                style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;"
                                value="{{old("firstname")}}"
                            />
                            </span>
                            <span class="border-input-left">
                            <input
                                type="text"
                                name="lastname"
                                id="ln"
                                placeholder="Last Name"
                                class="form-control"
                                required
                                style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;"
                                value="{{old("lastname")}}"
                            />
                            </span>
                        </div>
                        @error('firstname')
                            {{$message}}
                        @enderror
                        @error('lastname')
                            {{$message}}
                        @enderror
                    </div>


                    <div class="row my-3 email">
                        <div class="input-group">
                            <span class="input-group-text">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-envelope-at"
                                viewBox="0 0 16 16"
                            >
                                <path
                                d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"
                                />
                                <path
                                d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"
                                />
                            </svg>
                            </span>
                            <input
                            type="email"
                            id="emails"
                            name="emails"
                            class="form-control"
                            placeholder="Email"
                            required
                            value="{{old("emails")}}"
                            />
                        </div>
                        @error('emails')
                            {{$message}}
                        @enderror
                    </div>

                    <div class="my-3">
                        <div class="input-group">
                            <span class="input-group-text">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-shield-lock"
                                viewBox="0 0 16 16"
                            >
                                <path
                                d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"
                                />
                                <path
                                d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"
                                />
                            </svg>
                            </span>

                            <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="Password"
                            required

                            />
                        </div>
                        @error('password')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="my-3">
                        <div class="input-group">
                            <span class="input-group-text">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-shield-lock"
                                viewBox="0 0 16 16"
                            >
                                <path
                                d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"
                                />
                                <path
                                d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"
                                />
                            </svg>
                            </span>

                            <input
                            type="password"
                            id="password"
                            name="password_same"
                            class="form-control"
                            placeholder="Re-enter password"
                            required

                            />
                        </div>
                        @error('password_same')
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
