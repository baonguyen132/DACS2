<form action="{{route("cart.store")}}" method="POST" enctype="multipart/form-data">
    <div class="information_user">
        <h3>Thông tin</h3>
        <p><b>+ Họ tên:</b> {{$user->name}}</p>
        <p><b>+ Căn cước:</b> {{$user->cccd}}</p>
        <p><b>+ Ngày sinh:</b> {{$user->dob}}</p>
        <p><b>+ Giới tính:</b> {{$user->gender}}</p>
    </div>
    <div class="comfirm">
        <h3>Xác nhận</h3>
        <div class="form-floating">
            <input type="text" class="form-control" placeholder="Address" id="address" value="{{$user->address}}" name="address" >
            <label id="address">Address</label>
        </div>
        <div class="form-floating">
            <p>Ảnh minh chứng</p>

            <input type="text" name="fileimage" id="fileimage" class="form-control" style="padding: 18px 20px;" required>
        </div>
        <div class="infor">
            <section class="test">
                <p><b>Số lượng pin: </b><span class="count">0</span></p>
            </section>
            <section class="option-container">

                <p class="subtotal"><b>Tổng điểm: </b><span>0</span></p>
            </section>

        </div>
    </div>
    @csrf
    <button type="submit" value="" name="comfirm" class="buttonConfirm" >Xác nhận</button>


   @if (Session::has("fail"))
       {{
        Session::get("fail")
       }}
   @endif


</form>
