<div id="main-battery">
    <div class="batterys">
        <h2 class="slogan_battery"><span>Phân loại pin cũ - <strong>Tích điểm</strong> đổi quà</span></h2>
        <div class="center_page" id="okkk">
            <div class="row parent-battery">


            </div>
        </div>
        <div class="center-battery">
            <button class="open_mode_load_image" data-bs-toggle="modal" data-bs-target="#open_mode_load_image">
                Tải ảnh lên
            </button>
            <button class="add_battery" onclick="addCart()">
                Addcart
            </button>
        </div>
    </div>


</div>

<div class="modal fade" id="open_mode_load_image">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tải ảnh lên</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="form_upload_image">
                    <div class="forminput mb-3">
                        <input type="file" id="imageInput" class="form-control">
                    </div>
                    <button onclick="uploadImage()" data-bs-dismiss="modal" class="btn send_image">Gửi ảnh</button>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script src= "{{asset("asset/javascript/User/battery.js")}}"></script>
