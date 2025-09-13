<form method="POST" action="{{route("battery.store")}}" enctype="multipart/form-data">
    <div class="col-sm-12">
        <h4>Name Battery</h4>
        <div class="form-floating">
            <input type="text" name="battery" required autocomplete="off" autofocus class="form-control">

        </div>
        @error('battery')
           {{$message}}
        @enderror
    </div>
    <div class = "col-sm-12">
        <div class="row">
            <div class="col-sm-4">
                <h4>Size</h4>
                <div class="form-floating">
                    <input type="text" class="form-control" name = "size"  required  autocomplete="off" >
                </div>
                @error('size')
                    {{$message}}
                @enderror
            </div>
            <div class="col-sm-4">
                <h4>Shape</h4>
                <div class="form-floating">
                    <input type="text" class="form-control" required name = "shape" autocomplete="off" >
                    @error('shape')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <h4>Point</h4>
                <div class="form-floating">
                    <input type="number" class="form-control" required name = "point" autocomplete="off"  min="1" max="20" step="1">
                </div>
                @error('point')
                    {{$message}}
                @enderror
            </div>

        </div>

    </div>
    <div class = "col-sm-12">
        <div class="row">
            <h4>Upload Picture</h4>
            <div class="form-floating">
                <input type="file" name = "imagebattery" required class="form-control">
            </div>
            @error('imagebattery')
                {{$message}}
            @enderror
        </div>
    </div>
    <div class="col-sm-12">
        @csrf
        <input type="submit" value="Submit" name="submitbattery" >

    </div>
</form>