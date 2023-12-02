Cảm ơn {{$fullname}} đã góp phần bảo vệ môi trường
<br>
Đây là mã QR mà bạn đã trao đổi điểm với chúng tôi
<div style="">
    <button style="width: 150px;height: 40px;margin: 10px 0px;border: none;border-radius: 5px;background-color: #0d6efd;">
        <a style="display: block;width: 100%;color: #fff !important;text-decoration: none;font-size: 13.5px;" href="{{route("exchange.viewQR" , ["image" => $image])}}">QR Code</a>
    </button>
</div>

