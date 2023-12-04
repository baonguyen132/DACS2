<div class="profile_user" @if (file_exists(public_path("storage/upload/" . $employee->cccd . "/upload_image_page.jpg"))) id = "profile_user"  @endif >
    <div class="image_profile"

        @if (file_exists(public_path("storage/upload/" . $employee->cccd . "/upload_image_page.jpg")))
            style = "background-image: url({{asset("storage/upload/" . $employee->cccd . "/upload_image_page.jpg")}})"
        @else
            id="image_profile"
        @endif
    >
        <div class="avata_div">
            <div class="avata_image_profile"
                @if (file_exists(public_path("storage/upload/" . $employee->cccd . "/upload_image_avata.jpg")))
                    style = "background-image: url({{asset("storage/upload/" . $employee->cccd . "/upload_image_avata.jpg")}})"
                @else
                    style = "background-image: url(https://nhanvietluanvan.com/wp-content/uploads/2023/05/c6e56503cfdd87da299f72dc416023d4-736x620.jpg)"
                    id="avata_image_profile"
                @endif
            >

            </div>
        </div>
    </div>
    <div class = "information_back">
        <div class="information_profile">
            <div class="title">
                <h2><b>Information of  </b>{{$employee->name}}</h2>

            </div>
            <div class ="row information">
                <div class="col-xl-7 col-lg-7 col-md-7   p-0">
                    <div class = "fullname">
                        <h4><b>Fullname: </b> {{$employee->name}} </h4>
                    </div>
                    <div class = "dob">
                        <h4><b>Date of birth: </b>{{$employee->dob}} </h4>
                    </div>
                    <div class = "gender">
                        <h4><b>Gender: </b> {{$employee->gender}}</h4>
                    </div>
                    <div class = "Front_CCCD">
                        <h4><b>Front CCCD: </b>@if (file_exists(public_path("storage/upload/" . $employee->cccd . "/citizen_identification_front.jpg")))Update @else Not update @endif</h4>
                    </div>
                    <div class = "Backside_CCCD">
                        <h4><b>Backside CCCD: </b> @if (file_exists(public_path("storage/upload/" . $employee->cccd . "/citizen_identification_back.jpg")))Update @else Not update @endif </h4>
                    </div>

                </div>
                <div class="col-xl-5 col-lg-5 col-md-5  p-0">
                    <div class = "cccd">
                        <h4><b>Citizen ID: </b> {{$employee->cccd}}</h4>
                    </div>
                    <div class = "pod">
                        <h4><b>Place of brith: </b> {{$employee->pob}}</h4>
                    </div>
                    <div class="accommodation">
                        <h4><b>Address: </b> {{$employee->address}} </h4>
                    </div>
                    <div class = "card_image">
                        <h4><b>Card image: </b>@if (file_exists(public_path("storage/upload/" . $employee->cccd . "/upload_card_image.jpg")))Update @else Not update @endif</h4>
                    </div>

                </div>
            </div>


            @if ($employee->status <=3 || $employee->status == 5 && $user->status >= 3 && $employee->status !=  $user->status )
                <div class="button_information">
                    <div class = "import_account_first">
                        <button class="import" data-bs-toggle = "modal" data-bs-target = "#add_access" >Import</button>

                    </div>
                    <div class = "delete_account_first">
                        <button class="delete" data-bs-toggle="modal" data-bs-target = "#delete_account" >Delete</button>
                    </div>
                </div>
            @endif



        </div>

        <div class = "go_back">
            <a href="{{route("register.index" , ["detail" => $detail])}}" >Go back <i class='bx bxs-right-arrow-circle'></i></a>
        </div>
    </div>

</div>

@if ($employee->status <=3 || $employee->status == 5 && $user->status >= 3 && $employee->status !=  $user->status)
    <div class = "modalclass" >
        <div class = 'modal fade' id ='add_access'>
            <div class ='modal-dialog'>
                <div class = 'modal-content'>
                    <div class="modal-header">
                        <h4 class="modal-title ">Register an account</h4>
                        <button type="button" data-bs-dismiss="modal" class="btnclose"><i class='bx bx-x'></i></button>
                    </div>
                    <div class='modal-body'>
                        <form method = 'POST' action="{{route("register.update" , ['id' => $employee->id , 'type' => 'grant_permissions'])}}">
                            @if ($employee->status <=3)
                                <ladel for = 'cccd_account' class="">Citizen ID</ladel>
                                <input id='cccd_account' type ='text' disabled class='form-control' value='{{$employee->cccd}}'/>

                                <ladel for = 'fullname_account' class="">Full name</ladel>
                                <input id = 'fullname_account' type = 'text' class = 'form-control' disabled  value = '{{$employee->name}}' />

                                <ladel for = 'grant_permissions' class="">Grant permissions</ladel>
                                <select name="grant_permissions" id = "grant_permissions" class="form-control" style="margin: 10px 0;">
                                    <option @if ($employee->status == -1) selected  @endif  value="-1">Account lock</option>
                                    <option @if ($employee->status == 1) selected  @endif value="1">Account limit</option>
                                    <option @if ($employee->status == 2) selected  @endif value="2">Viewing allowed</option>
                                    <option @if ($employee->status == 3) selected  @endif value="3">Editing allowed</option>
                                    <option value="5">Customer</option>
                                </select>
                            @else
                                <select name="grant_permissions" id = "grant_permissions" class="form-control" style="margin: 10px 0;">
                                    <option  value="5">Customer</option>
                                    <option  value="1">Account limit</option>
                                </select>
                            @endif


                            @csrf

                            <input type = 'submit' class='btn ' value = 'Import' name='import_acount_first' >
                        </form>

                    </div>
                    <div class='modal-footer'>
                        <button class='btn ' type='button' data-bs-dismiss='modal'>Close</button>
                    </div>

                </div>
            </div>
        </div>


        <div class = 'modal fade' id = 'delete_account'>
            <div class= 'modal-dialog'>
                <div class = 'modal-content'>
                    <div class = 'modal-header'>
                        <h4 class='modal-title'>Delete an account</h4>
                    </div>
                    <div class = 'modal-body'>
                        <form method = 'POST' action="{{route("register.destroy" , ['id' => $employee->id ,"detail" => $detail])}}">
                            <ladel for = 'cccd_accounts' class="">Citizen ID</ladel>
                            <input id='cccd_accounts' type ='text' disabled class='form-control' value='{{$employee->cccd}}'/>

                            <ladel for = 'fullname_accounts' class="">Full name</ladel>
                            <input id = 'fullname_accounts' type = 'text' class = 'form-control' disabled  value = '{{$employee->name}}' />

                            @csrf

                            <input style = 'margin-top: 10px;' type = 'submit' name = 'delete_account' value = 'Delete'  class = 'btn btn-primary'>
                        </form>
                    </div>
                    <div class = 'modal-footer'>
                        <button class = 'btn btn-primary' data-bs-dismiss = 'modal' type = 'button' >Close</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endif

