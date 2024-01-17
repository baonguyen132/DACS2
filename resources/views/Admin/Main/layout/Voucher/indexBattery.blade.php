<div class="col-sm-12">
    <div class="row listVoucher">


        @foreach ($dataBattery as $item)
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
                                   @php $a = explode( " " , $item->name_voucher )  @endphp
                                    Sale {{$a[0]}}

                                </h3>
                                <ul>
                                    <li><b>Point:</b>  {{$item->point}}</li>
                                    <li><b>Voucher Branch:</b> {{$item->name_branch_voucher}}</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="edit-voucher">
                        <div class="editV">

                            <button type="button" data-bs-toggle="modal" class="upload" data-bs-target="#update{{$item->idvoucher}}">
                                Edit
                            </button>
                            <form method="POST" action="{{route("voucher.deleteVoucher" , ["id" => $item->idvoucher])}}">
                                @csrf
                                <button type="submit" name="deleteVoucher" class="deleteVoucher" value="{{$item->image}}">Delete</button>
                            </form>

                            <div class="modal fade" id="update{{$item->idvoucher}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3>Edit Voucher</h3>
                                            <button type="button" data-bs-dismiss="modal" class="btnclose"><i class="bx bx-x"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{route("voucher.updateVoucher" , ["id" => $item->idvoucher])}}" enctype="multipart/form-data">
                                                <div class="col-sm-12">

                                                    <div class="form-floating">
                                                        <input value="{{$item->name_voucher}}" type="text" name="nameVoucherEdit" id="namevoucher" placeholder="Name Voucher" required autocomplete="off" autofocus class="form-control">
                                                        <label for="namevoucher">Name Voucher</label>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-8">

                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" disabled name = "codeVoucherEdit" id="codevoucher" placeholder="Code Voucher" required autocomplete="off" value ="{{$item->code_voucher}}">
                                                                <label for="codevoucher">Code Voucher</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">

                                                            <div class="form-floating">
                                                                <input  type="number" class="form-control" required name = "pointVoucherEdit" id="pointVoucher" autocomplete="off" step="1" min="20"  placeholder="pointVoucher" value ="{{$item->point}}">
                                                                <label for="pointVoucher">Point</label>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>
                                                <div class = "col-sm-12">
                                                    <div class="row">

                                                        <div class="form-floating">
                                                            <select class="chooseBV" name="chooseBVEdit" >

                                                                @foreach ($dataBranch as $branch)
                                                                    <option value="{{$branch["id"]}}" @if ($branch["id"] == $item->idbranch) selected  @endif >{{$branch["name_branch_voucher"]}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input type="submit" value="Submit" name="submitVoucherEdit" >
                                                </div>
                                                @csrf
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-bs-dismiss="modal" >Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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

</div>
<div class="viewInsert">
    <button type = "button" class="viewInsertButton">
        <a href="{{route("voucher.createVoucher")}}">
            <i class='bx bx-plus'></i>
        </a>
    </button>
</div>
