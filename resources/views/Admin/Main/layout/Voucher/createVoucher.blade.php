<form method="POST" action="" enctype="multipart/form-data">
    <div class="col-sm-12">
        <h4>Name Voucher</h4>
        <div class="form-floating">
            <input type="text" name="nameVoucher" required autocomplete="off" autofocus class="form-control" value="{{old("nameVoucher")}}">

        </div>
        @error('nameVoucher')
            {{$message}}
        @enderror
    </div>
    <div class = "col-sm-12">
        <div class="row">
            <div class="col-sm-8">
                <h4>Code Voucher</h4>
                <div class="form-floating">
                    <input type="text" class="form-control" name = "codeVoucher"  required autocomplete="off" value="{{old("codeVoucher")}}" >
                </div>
                @error('codeVoucher')
                    {{$message}}
                @enderror
            </div>
            <div class="col-sm-4">
                <h4>Point</h4>
                <div class="form-floating">
                    <input type="number" class="form-control" required name = "pointVoucher" autocomplete="off" step="1" min="20" value="{{old("pointVoucher")}}"  >
                </div>
                @error('pointVoucher')
                    {{$message}}
                @enderror
            </div>


        </div>

    </div>
    <div class = "col-sm-12">
        <div class="row">
            <h4>Select Branch Voucher</h4>
            <div class="form-floating">
                <select class="chooseBV" name="chooseBV">
                    @foreach ($data as $item)
                        <option @if (old("pointVoucher") == $item["id"] )
                            selected
                        @endif value="{{$item["id"]}}">{{$item["name_branch_voucher"]}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        @csrf
        <input type="submit" value="Submit" name="submitVoucher" >

    </div>
</form>
