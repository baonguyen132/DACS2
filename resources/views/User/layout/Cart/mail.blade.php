<div>
    <div style="">
        <p style="margin: 5px 0px">Xin chào: {{$fullname}}</p>
        <p style="margin: 5px 0px">Cảm ơn bạn đã chung tay bảo vệ môi trường</p>
        <p style="margin: 5px 0px">Khi nào bạn gặp người thu gom pin cũ bạn có thể đưa mã QR này cho họ.</p>

    </div>
    <div>
        <table style="width: 550px;text-align: center;">
            <thead>
                <tr style="height: 30px; ">
                    <th style="border: 1px solid; font-size: 16px;">STT</th>
                    <th  style="border: 1px solid; font-size: 16px;">Tên loại pin</th>
                    <th  style="border: 1px solid; font-size: 16px;">Điểm</th>
                    <th  style="border: 1px solid; font-size: 16px;">Số lượng</th>
                    <th  style="border: 1px solid; font-size: 16px;  "></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tbody>
                @php
                    $stt = 1 ;
                    $tong = 0 ;
                @endphp
                @foreach ($battery as $row)
                    <tr style="height: 55px; ">
                        <td style=" border: 1px solid; font-size: 15px; padding: 0px; ">{{$stt}}</td>
                        <td style=" border: 1px solid; font-size: 15px; padding: 0px; ">{{$row->name_battery}}</td>
                        <td style=" border: 1px solid; font-size: 15px; padding: 0px; ">{{$row->point}}</td>
                        <td style=" border: 1px solid; font-size: 15px; padding: 0px; ">{{$cart[$row->id]}}</td>
                        <td style=" border: 1px solid; font-size: 15px; padding: 0px; ">{{$cart[$row->id] * $row->point }}</td>
                    </tr>
                    @php
                        $stt++ ;
                        $tong += ($cart[$row->id] * $row->point) ;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="4" style=" border: 1px solid; font-size: 20px; padding: 0px; font-weight: bolder;" >Tổng điểm</td>
                    <td style=" border: 1px solid; font-size: 15px; padding: 0px;">{{$tong}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="">
        <button style="width: 150px;height: 40px;margin: 10px 0px;border: none;border-radius: 5px;background-color: #0d6efd;">
            <a style="display: block;width: 100%;color: #fff !important;text-decoration: none;font-size: 13.5px;" href="{{route("cart.qr" , ["id" => $file])}}">QR Code</a>
        </button>
    </div>
</div>


