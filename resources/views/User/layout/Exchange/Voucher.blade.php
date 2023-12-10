<div class="row listVoucher">
    <div class="exchange__container-list">
        @php
            $i = 1;
            $max = count($data) ;
        @endphp
        <div class="exchange__container-list-row row" >
            @forelse ($data as $item)
                <div class="exchange__container-item " id="voucher{{$item->id}}">
                    <img src="{{asset("storage/image/Branch/$item->id_branch_voucher.jpg")}}" alt="" />
                    <div class="exchange__container-body">
                    <h2>{{$item->name_voucher}}</h2>
                    <ul>
                        <li><span>Point:</span> {{$item->point}}</li>

                    </ul>
                        <div class="exchange__container-btn">
                            <button name="savevoucher" onclick="exchange({{$item->id}})" value="" >Lưu</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="result">
                    <b>Hiện tại không bạn chưa có voucher</b>
                </div>
            @endforelse
        </div>
    </div>
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
