<div class="row listVoucher">


    @foreach ($data as $item)
        <div class="voucher">
            <div class="content-voucher">
                <div class="code-voucher">
                    <div class="contentV">
                        <div class="content-image">
                            <img src="{{asset("storage/image/Branch/$item->id.jpg")}}"  width ="80%" height = "80%">
                        </div>
                        <div class="content-introduce">
                            <h3>
                                {{$item->name_branch_voucher}}

                            </h3>
                            <button><a href="{{route("exchange.voucher" , ["idbranch" => $item->id  , "page" => 1 ])}}">List voucher</a></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endforeach



</div>
