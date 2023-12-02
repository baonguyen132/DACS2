<div id="history">
    <h1 class="history__tittle top-animation">Lịch sử</h1>
    <hr />
    <p class="history__thanks bottom-animation" style="padding: 12px 0">
    Cảm ơn những đóng góp của bạn.
    </p>
    <p class="history__thanks bottom-animation">
    Bảo vệ môi trường là trách nhiệm cũng như nghĩa vụ của mỗi cá nhân, chỉ
    một hành động nhỏ sẽ tạo ra một sức mạnh lớn giúp bảo vệ sự sống cho
    toàn nhân loại
    </p>

    <div class="details row">
        <div class="col-xl-4 col-lg-3 col-md-3 col-sm-12">
            <div class="information_user">
                <h3>Thông tin</h3>
                <p><b>+ Họ tên:</b> {{$user->name}}</p>
                <p><b>+ Căn cước:</b> {{$user->cccd}}</p>
                <p><b>+ Ngày sinh:</b> {{$user->dob}}</p>
                <p><b>+ Giới tính:</b> {{$user->gender}}</p>
                <h3>Giỏ hàng</h3>
                <p><b>+ Tổng điểm:</b> {{$cart[0]["total"]}}</p>
                <p><b>+ Địa chỉ:</b> {{$cart[0]["address"]}}</p>
            </div>
        </div>
        <div class = "listcart col-xl-8 col-lg-9 col-md-9 col-sm-12">
            <section class="">
                <ul class="products">
                    @foreach ($detail as $row)
                        <li class="rows" id="li">
                            <div class="col left">
                                <div class="thumbnail">
                                    <img src="{{asset("storage/image/Battery/$row->image.jpg")}}" alt="">
                                </div>
                                <div class="detail">
                                    <div class="name"><a href="#">{{$row->name_battery}}</a></div>
                                    <div class="description">
                                        <ul>
                                            <li><b>Shape: {{$row->shape}}</b> </li>
                                            <li><b>Size: {{$row->size}}</b> </li>
                                        </ul>
                                    </div>
                                    <div class="price"></div>
                                </div>
                            </div>
                            <div class="col right">
                                <div class="quantity">
                                    <input type="number" class="quantity" step="1" value="{{$row->count}}" >
                                </div>

                            </div>
                        </li>
                    @endforeach

                </ul>
            </section>
        </div>
    </div>
</div>
