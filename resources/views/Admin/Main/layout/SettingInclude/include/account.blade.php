<div class="row" id="information_account">
    <div class="col-sm-12 form_title_account">
        <div class="title_account">
            <h2 style="padding: 0 10px; text-align: center; ">Information account</h2>
        </div>
        <div class=" row form_update_account">
            <div style="margin: 20px 0;" class="col-xl-5 col-lg-6 information_account">
                <div class="information_account_4">
                    <h3>Information</h3>
                    <ul class="nav flex-column nav-list">
                        <li><span>- Full name: </span>{{$user->name}}</li>
                        <li><span>- Citize identification: </span>{{$user->cccd}}</li>
                        <li><span>- Job position: </span></li>
                    </ul>
                </div>

            </div>
            <div style="margin:20px 0px ;" class="  col-xl-6 col-lg-6 username_password">
                <div class="username_password_4">
                    <h3>Update password</h3>
                    <form method="POST" action="{{route("setting.updatePassword")}}">
                        <div class="form-floating">
                            <input type="password" name="oldpassword" class="form-control" id="oldpassword" placeholder="Old password" required autocomplete="off"  value="">
                            <label for  = "oldpassworld">Old password</label>
                        </div>
                        @error('oldpassword')
                            {{$message}}
                        @enderror
                        <div class="form-floating">
                            <input type="password" name="newpassword" class="form-control" id="newpassword" placeholder="New Password" required  autocomplete="off" value="">
                            <label for="newpassword">New Password</label>
                        </div>
                        @error('newpassword')
                            {{$message}}
                        @enderror
                        <div class="form-floating">
                            <input type="password" name="confirmpassword" class="form-control" id="newpassword" placeholder="Confirm password" required  autocomplete="off" value="">
                            <label for="update_pw">Confirm password</label>
                        </div>
                        @error('confirmpassword')
                            {{$message}}
                        @enderror
                        @csrf
                        <input type="submit" name="submit_upload_account" value="Update" class="btn btn-primary">

                        @if (Session::has("result"))
                        {{
                            Session::get("result")
                        }}
                    @endif
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
