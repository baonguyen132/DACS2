<div class="row mb-2" >
    <div class="col-sm-12 " id="avata_page_image">
        <div class="row" id="page_link" style="background-image: url({{$link_page}}) ;">
            <div class="col-sm-7 riw" >
                <div type = "button"  data-bs-toggle = "modal" data-bs-target = "#avatamodal"  class="img" style="background-image: url({{$link_avata}});">
                </div>
                <div class="modal fade" id="avatamodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Edit Image</h3>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('setting.uploadAvataPage')}}" enctype="multipart/form-data" id = "form1">
                                    <label class="mx-1" for="avata">Avata</label>
                                    <input class="form-control my-3" type="file" name="upload_image_avata" id="avata" form="form1" >
                                    <label class="mx-1" for="avata_page">Avata_page</label>
                                    <input type="file" name="upload_image_page" class="form-control my-3" id="avata_page">
                                    <input class="btn btn-primary" value="Upload" type="submit" name="submit_upload_image">
                                    @csrf
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-bs-dismiss = "modal" class="btn btn-primary">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="title" style="align-items: center;;" >

            <div class="col-sm-7" style="z-index: 1; height: 100%;">
                <div class="row" >
                    <div class="col-xl-6 col-lg-10" style="text-align: center;">
                            <h3 id="full_name" style="">{{$user->name}}</h3>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
