<div class="row listVoucher">

    @forelse ($voucher as $item)
        <div class="voucher">
            <div class="content-voucher">
                <div class="code-voucher">
                    <div class="contentV">
                        <div class="content-image">
                            @php
                                $fp = fopen(public_path("storage/image/QRCode/$item->image.txt"), "r");//mở file ở chế độ đọc

                                while(! feof($fp)) {
                                    echo fgets($fp);
                                }

                                fclose($fp);
                            @endphp
                        </div>
                        <div class="content-introduce">
                            <h3>
                                {{$item->name_voucher}}
                            </h3>
                            <ul>
                                <li><b>Point:</b>  {{$item->point}}</li>
                                <li><b>Code:</b> {{$item->code_voucher}}</li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @empty
        <div class="result">
            <b>Hiện tại không bạn chưa có voucher</b>
        </div>
    @endforelse



</div>
<div class="page" >
    <button class="back" onclick="back()">
        <i class='bx bx-chevrons-left' ></i>
    </button>
    <input type="number" class="page" inputmode="numeric" onchange="setPage(event , {{$count}})" min="1" value="{{$pageVoucher}}" id="page">

    <button class = "next">
        <i class='bx bx-chevrons-right' onclick="next({{$count}})" ></i>
    </button>
</div>
