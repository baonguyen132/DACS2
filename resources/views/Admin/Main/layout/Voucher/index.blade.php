<div class="col-sm-12">
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
                                <ul>
                                    <li><b>Number voucher:</b> {{$item->count}}</li>
                                    <li><b><a href="{{route("voucher.index.battery" , ["id" => $item->id , "page" => 1])}}">List voucher</a></b> </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="edit-voucher">
                        <div class="editV">

                            <button type="button" class="upload" >
                                <a href="{{route("voucher.editBranch" , ["id" => $item->id ])}}">Edit</a>
                            </button>


                            <button name="deleteVoucher" class="deleteVoucher">
                                <a href="{{route("voucher.deleteBranch" , ["id" => $item->id ])}}">Delete</a>
                            </button>




                        </div>
                    </div>
                </div>
            </div>
        @endforeach



    </div>

</div>
<div class="viewInsert">
    <button type = "button" class="viewInsertButton">
        <a href="{{route("voucher.createBranch")}}">
            <i class='bx bx-plus'></i>
        </a>
    </button>
</div>

@if (Session::has("result"))
    @verbatim
    <script>
        window.alert("not successful")
    </script>
    @endverbatim
@endif

