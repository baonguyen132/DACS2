@foreach ($branch as $item)
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="col-sm-12">
            <h4>Name Branch</h4>
            <div class="form-floating">

                <input type="text" name="branch" required autocomplete="off" autofocus class="form-control" value="{{$item->name_branch_voucher }}">

            </div>

        </div>

        <div class = "col-sm-12">
            <div class="row">
                <h4>Upload Picture</h4>
                <div class="form-floating">
                    <input type="file" name = "imagebranch"  class="form-control">
                </div>

            </div>
        </div>
        <div class="col-sm-12">
            @csrf
            <input type="submit" value="Submit" name="submitbranch" >

        </div>
    </form>
@endforeach

