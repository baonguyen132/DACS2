<div class="row" id="my_information">
    <div class="col-sm-12" id="title_information" >
        <h2>My information</h2>
    </div>
    <div class="col-sm-12">
        <div class="row my_information">
            <div class="col-xl-7 col-lg-8">
                <div class="row " style=" margin-bottom: 0px; " >
                    <div class="fullname_information">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4>Full name</h4>

                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="fullname_infor" id="infor_name" value="{{$user->name}}" required autocomplete="off"  form = "upload_my_information">
                            </div>
                        </div>
                    </div>
                    <div class="dateofbirth_information">
                        <div class="row date_of_birth" >
                            <div class="col-sm-4">
                                <h4>Date of birth</h4>
                            </div>
                            <div class="col-sm-8" >
                                <input type="date" class="form-control" required  name="dateofbirth_information" value="{{$user->dob}}" form = "upload_my_information">
                            </div>
                        </div>
                    </div>
                    <div class="gender_information">
                        <div class="row gender">
                            <div class="col-xl-4 col-md-4">
                                <h4>Gender</h4>
                            </div>
                            <div class="col-xl-4 col-md-6" style="float: left;">
                                <label for="male">Male</label>
                                <input type="radio" name="gender_information" @if ($user->gender == "Male") checked @endif  value="Male" required id="male" form = "upload_my_information">
                                <label for="female">Female</label>
                                <input type="radio" name="gender_information"  @if ($user->gender == "Female") checked @endif  value="Female" required id="female" form = "upload_my_information" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 card_image" >

                <div class="row image" style=" margin-bottom:20px ;">

                    @if ($upload_card_image == NULL)
                        <h4>Card image</h4>
                        <input style = 'margin-bottom: 0px;' type='file' name='upload_card_image' required autocomplete='off'  form = 'upload_my_information' >
                    @else
                        <img src = '{{$upload_card_image}}' style='padding : 0px ;'  width = '150px' height = '200px' >
                    @endif



                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="row">
            <div class="cccd_information">
                <div class="row information">
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <h4>Citizen identification</h4>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-8">
                        <input type="text" name="citizen_identification" class="form-control" id="citizen_identification" value="{{$user->cccd}}"  disabled  required form = "upload_my_information">
                    </div>
                </div>
                <div class="row card_citizen">
                    <div class="col-xl-5 col-lg-6 col-md-8 ">
                        <h4>Front CCCD </h4>
                        @if ($citizen_identification_front == NULL)
                            <input type = 'file' name = 'citizen_identification_front' required autocomplete= 'off'  form = 'upload_my_information' />
                        @else
                            <img src = '{{$citizen_identification_front}}'  width = '100%'  />
                        @endif

                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <h4>Backside CCCD</h4>
                        @if ($citizen_identification_back == NULL)
                            <input type = 'file' name = 'citizen_identification_back' required autocomplete= 'off'  form = 'upload_my_information' />
                        @else
                            <img src = '{{$citizen_identification_back}}'  width = '100%'  />
                        @endif

                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="place_brith_information">
                <div class="row placeofbrith">
                    <div class="col-xl-3 col-lg-4 col-md-5">
                        <h4>Place of brith</h4>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-7">
                        <input type="text" name="my_placeofbrith" required value="{{$user->pob}}" autocomplete="off" class="form-control" id="place_brith" form = "upload_my_information" >

                    </div>
                </div>

            </div>
            <div class="accommodation_present" >
                <div class="row accommodation" >
                    <div class="col-xl-3 col-lg-4 col-md-5">
                        <h4>Accommodation</h4>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-7">
                        <input type="text" name="accommodation_infor" value="{{$user->address}}" required autocomplete="off"  class="form-control" id="accommodation_infor" form = "upload_my_information" >
                    </div>
                </div>
            </div>
            <div class="upload_my_information">
                <form method="POST" action="{{route('setting.updateInformation')}}" enctype="multipart/form-data" id="upload_my_information">
                    @csrf
                    <input type="submit" name="submit_my_information" class="btn btn-primary" value="Upload information">
                </form>



            </div>
        </div>
    </div>
</div>
