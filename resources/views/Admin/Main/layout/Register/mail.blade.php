<div>
    <div style="">
        <p style="margin: 5px 0px">Xin chào: <b>{{$fullname}}</b></p>
        <p style="margin: 5px 0px">Chúng mình cảm ơn bạn đã tham gia vào hệ thống của chúng mình</p>
        <p style="margin: 5px 0px">Chúng mình gửi thông tin tài khoản cho bạn. Bạn vui lòng kiểm tra thông tin cá nhân của bạn và bấm kích hoạt tài khoản để tài khoản. Bạn vui lòng không để thông tin thư này cho người khác biết.</p>
        <p style="margin: 5px 0px"><b>Họ tên: </b>{{$fullname}}</p>
        <p style="margin: 5px 0px"><b>Ngày sinh: </b>{{$dob}}</p>
        <p style="margin: 5px 0px"><b>Căn cước: </b>{{$cccd}}</p>

        <p style="margin: 5px 0px"><b>Username: </b>{{$username}}</p>
        <p style="margin: 5px 0px"><b>Password: </b>{{$password}}</p>
    </div>
    <div style="">
        <button style="width: 150px;height: 40px;margin: 10px 0px;border: none;border-radius: 5px;background-color: #0d6efd;">
            <a style="display: block;width: 100%;color: #fff !important;text-decoration: none;font-size: 13.5px;" href="{{ route('login.confirm', ['token'=>$token , 'cccd' => $cccd ]) }}">Kích hoạt tài khoản</a>
        </button>
    </div>
</div>


