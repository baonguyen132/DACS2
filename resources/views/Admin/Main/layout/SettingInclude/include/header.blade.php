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
                                <h3 style="color: #10a95a; font-weight: 700; font-size: 1.5rem; letter-spacing: 0.5px; margin: 0; font-family: 'Segoe UI', sans-serif;">
                                    <i class='bx bx-edit-alt' style="margin-right: 10px; font-size: 1.6rem;"></i>
                                    Chỉnh sửa hình ảnh
                                </h3>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('setting.uploadAvataPage')}}" enctype="multipart/form-data" id = "form1">
                                    <label class="mx-1" for="avata" style="font-weight: 700; color: #10a95a; font-size: 1.1rem; font-family: 'Segoe UI', sans-serif; margin-bottom: 8px; display: block;">
                                        <i class='bx bx-user-circle' style="margin-right: 8px;"></i>Ảnh đại diện
                                    </label>
                                    <input class="form-control my-3" type="file" name="upload_image_avata" id="avata" form="form1" style="border: 2px solid rgba(16, 169, 90, 0.3); border-radius: 10px; padding: 12px; font-size: 1rem; transition: all 0.3s ease;" >
                                    <label class="mx-1" for="avata_page" style="font-weight: 700; color: #10a95a; font-size: 1.1rem; font-family: 'Segoe UI', sans-serif; margin-bottom: 8px; display: block;">
                                        <i class='bx bx-image-alt' style="margin-right: 8px;"></i>Ảnh bìa trang cá nhân
                                    </label>
                                    <input type="file" name="upload_image_page" class="form-control my-3" id="avata_page" style="border: 2px solid rgba(16, 169, 90, 0.3); border-radius: 10px; padding: 12px; font-size: 1rem; transition: all 0.3s ease;">
                                    <input class="btn btn-primary" value="Tải lên" type="submit" name="submit_upload_image" style="background: linear-gradient(135deg, #10a95a 0%, #0d8b4a 100%); border: none; padding: 12px 30px; border-radius: 10px; font-weight: 700; font-size: 1.1rem; letter-spacing: 0.5px; color: white; cursor: pointer; transition: all 0.3s ease; margin-top: 10px;">
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
