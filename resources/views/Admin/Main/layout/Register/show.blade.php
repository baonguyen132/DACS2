<div class="profile_user" @if (file_exists(public_path("storage/upload/" . $employee->cccd . "/upload_image_page.jpg"))) id = "profile_user"  @endif >
    <div class="image_profile"

        @if (file_exists(public_path("storage/upload/" . $employee->cccd . "/upload_image_page.jpg")))
            style = "background-image: url({{asset("storage/upload/" . $employee->cccd . "/upload_image_page.jpg")}})"
        @else
            id="image_profile"
        @endif
    >
        <div class="avata_div">
            <div class="avata_image_profile"
                @if (file_exists(public_path("storage/upload/" . $employee->cccd . "/upload_image_avata.jpg")))
                    style = "background-image: url({{asset("storage/upload/" . $employee->cccd . "/upload_image_avata.jpg")}})"
                @else
                    style = "background-image: url(https://nhanvietluanvan.com/wp-content/uploads/2023/05/c6e56503cfdd87da299f72dc416023d4-736x620.jpg)"
                    id="avata_image_profile"
                @endif
            >

            </div>
        </div>
    </div>
    <div class = "information_back">
        <div class="information_profile">
            <div class="title">
                <h2 style="color: #10a95a; font-family: 'Segoe UI', sans-serif; font-weight: 700; font-size: 2rem; letter-spacing: 0.5px; margin-bottom: 25px; display: flex; align-items: center; gap: 12px;">
                    <i class='bx bx-user-circle' style="font-size: 2.2rem; background: rgba(16, 169, 90, 0.1); padding: 8px; border-radius: 10px;"></i>
                    <span>Thông tin của <span style="color: #0d8b4a;">{{$employee->name}}</span></span>
                </h2>
            </div>
            <div class ="row information">
                <div class="col-xl-7 col-lg-7 col-md-7 p-0">
                    <div class="info-item fullname">
                        <div class="info-icon-wrapper">
                            <i class='bx bx-user'></i>
                        </div>
                        <div class="info-content">
                            <span class="info-label">Họ và tên:</span>
                            <span class="info-value">{{$employee->name}}</span>
                        </div>
                    </div>
                    <div class="info-item dob">
                        <div class="info-icon-wrapper">
                            <i class='bx bx-calendar'></i>
                        </div>
                        <div class="info-content">
                            <span class="info-label">Ngày sinh:</span>
                            <span class="info-value">{{$employee->dob}}</span>
                        </div>
                    </div>
                    <div class="info-item gender">
                        <div class="info-icon-wrapper">
                            <i class='bx bx-male-female'></i>
                        </div>
                        <div class="info-content">
                            <span class="info-label">Giới tính:</span>
                            <span class="info-value">{{$employee->gender}}</span>
                        </div>
                    </div>
                    <div class="info-item Front_CCCD">
                        <div class="info-icon-wrapper">
                            <i class='bx bx-id-card'></i>
                        </div>
                        <div class="info-content">
                            <span class="info-label">CCCD mặt trước:</span>
                            <span class="info-value status-badge {{ file_exists(public_path("storage/upload/" . $employee->cccd . "/citizen_identification_front.jpg")) ? 'status-success' : 'status-pending' }}">
                                <i class='bx {{ file_exists(public_path("storage/upload/" . $employee->cccd . "/citizen_identification_front.jpg")) ? "bx-check-circle" : "bx-time-five" }}'></i>
                                {{ file_exists(public_path("storage/upload/" . $employee->cccd . "/citizen_identification_front.jpg")) ? "Đã cập nhật" : "Chưa cập nhật" }}
                            </span>
                        </div>
                    </div>
                    <div class="info-item Backside_CCCD">
                        <div class="info-icon-wrapper">
                            <i class='bx bx-id-card'></i>
                        </div>
                        <div class="info-content">
                            <span class="info-label">CCCD mặt sau:</span>
                            <span class="info-value status-badge {{ file_exists(public_path("storage/upload/" . $employee->cccd . "/citizen_identification_back.jpg")) ? 'status-success' : 'status-pending' }}">
                                <i class='bx {{ file_exists(public_path("storage/upload/" . $employee->cccd . "/citizen_identification_back.jpg")) ? "bx-check-circle" : "bx-time-five" }}'></i>
                                {{ file_exists(public_path("storage/upload/" . $employee->cccd . "/citizen_identification_back.jpg")) ? "Đã cập nhật" : "Chưa cập nhật" }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 p-0">
                    <div class="info-item cccd">
                        <div class="info-icon-wrapper">
                            <i class='bx bx-credit-card'></i>
                        </div>
                        <div class="info-content">
                            <span class="info-label">Số CCCD:</span>
                            <span class="info-value">{{$employee->cccd}}</span>
                        </div>
                    </div>
                    <div class="info-item pod">
                        <div class="info-icon-wrapper">
                            <i class='bx bx-map'></i>
                        </div>
                        <div class="info-content">
                            <span class="info-label">Nơi sinh:</span>
                            <span class="info-value">{{$employee->pob}}</span>
                        </div>
                    </div>
                    <div class="info-item accommodation">
                        <div class="info-icon-wrapper">
                            <i class='bx bx-home'></i>
                        </div>
                        <div class="info-content">
                            <span class="info-label">Địa chỉ:</span>
                            <span class="info-value">{{$employee->address}}</span>
                        </div>
                    </div>
                    <div class="info-item card_image">
                        <div class="info-icon-wrapper">
                            <i class='bx bx-image'></i>
                        </div>
                        <div class="info-content">
                            <span class="info-label">Ảnh thẻ:</span>
                            <span class="info-value status-badge {{ file_exists(public_path("storage/upload/" . $employee->cccd . "/upload_card_image.jpg")) ? 'status-success' : 'status-pending' }}">
                                <i class='bx {{ file_exists(public_path("storage/upload/" . $employee->cccd . "/upload_card_image.jpg")) ? "bx-check-circle" : "bx-time-five" }}'></i>
                                {{ file_exists(public_path("storage/upload/" . $employee->cccd . "/upload_card_image.jpg")) ? "Đã cập nhật" : "Chưa cập nhật" }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>


            @if ($employee->status <=3 || $employee->status == 5 && $user->status >= 3 && $employee->status !=  $user->status )
                <div class="button_information">
                    <div class="import_account_first">
                        <button class="import modern-btn import-btn" data-bs-toggle="modal" data-bs-target="#add_access">
                            <i class='bx bx-import'></i>
                            <span>Nhập tài khoản</span>
                        </button>
                    </div>
                    <div class="delete_account_first">
                        <button class="delete modern-btn delete-btn" data-bs-toggle="modal" data-bs-target="#delete_account">
                            <i class='bx bx-trash'></i>
                            <span>Xóa tài khoản</span>
                        </button>
                    </div>
                </div>
            @endif



        </div>

        <div class="go_back">
            <a href="{{route("register.index" , ["detail" => $detail])}}" class="back-link">
                <i class='bx bx-arrow-back'></i>
                <span>Quay lại danh sách</span>
                <i class='bx bx-right-arrow-alt'></i>
            </a>
        </div>
    </div>

</div>

@if ($employee->status <=3 || $employee->status == 5 && $user->status >= 3 && $employee->status !=  $user->status)
    <div class = "modalclass" >
        <div class = 'modal fade' id ='add_access'>
            <div class ='modal-dialog'>
                <div class = 'modal-content'>
                    <div class="modal-header modern-modal-header">
                        <h4 class="modal-title" style="color: #10a95a; font-weight: 700; font-size: 1.4rem; display: flex; align-items: center; gap: 10px; font-family: 'Segoe UI', sans-serif;">
                            <i class='bx bx-user-plus' style="font-size: 1.6rem; background: rgba(16, 169, 90, 0.1); padding: 8px; border-radius: 8px;"></i>
                            Đăng ký tài khoản
                        </h4>
                        <button type="button" data-bs-dismiss="modal" class="btnclose modern-close-btn">
                            <i class='bx bx-x'></i>
                        </button>
                    </div>
                    <div class='modal-body modern-modal-body'>
                        <form method='POST' action="{{route("register.update" , ['id' => $employee->id , 'type' => 'grant_permissions'])}}">
                            @if ($employee->status <=3)
                                <div class="form-group">
                                    <label for='cccd_account' class="modern-label">
                                        <i class='bx bx-credit-card'></i>
                                        Số CCCD
                                    </label>
                                    <input id='cccd_account' type='text' disabled class='form-control modern-input' value='{{$employee->cccd}}'/>
                                </div>

                                <div class="form-group">
                                    <label for='fullname_account' class="modern-label">
                                        <i class='bx bx-user'></i>
                                        Họ và tên
                                    </label>
                                    <input id='fullname_account' type='text' class='form-control modern-input' disabled value='{{$employee->name}}' />
                                </div>

                                <div class="form-group">
                                    <label for='grant_permissions' class="modern-label">
                                        <i class='bx bx-shield-check'></i>
                                        Cấp quyền
                                    </label>
                                    <select name="grant_permissions" id="grant_permissions" class="form-control modern-select">
                                        <option @if ($employee->status == -1) selected @endif value="-1">Tài khoản bị khóa</option>
                                        <option @if ($employee->status == 1) selected @endif value="1">Tài khoản hạn chế</option>
                                        <option @if ($employee->status == 2) selected @endif value="2">Cho phép xem</option>
                                        <option @if ($employee->status == 3) selected @endif value="3">Cho phép chỉnh sửa</option>
                                        <option value="5">Khách hàng</option>
                                    </select>
                                </div>
                            @else
                                <div class="form-group">
                                    <label for='grant_permissions' class="modern-label">
                                        <i class='bx bx-shield-check'></i>
                                        Cấp quyền
                                    </label>
                                    <select name="grant_permissions" id="grant_permissions" class="form-control modern-select">
                                        <option value="5">Khách hàng</option>
                                        <option value="1">Tài khoản hạn chế</option>
                                    </select>
                                </div>
                            @endif

                            @csrf
                            <input type='submit' class='btn modern-submit-btn' value='Nhập tài khoản' name='import_acount_first'>
                        </form>
                    </div>
                    <div class='modal-footer modern-modal-footer'>
                        <button class='btn modern-close-btn-footer' type='button' data-bs-dismiss='modal'>
                            <i class='bx bx-x'></i>
                            Đóng
                        </button>
                    </div>

                </div>
            </div>
        </div>


        <div class = 'modal fade' id = 'delete_account'>
            <div class= 'modal-dialog'>
                <div class = 'modal-content'>
                    <div class='modal-header modern-modal-header delete-modal-header'>
                        <h4 class='modal-title' style="color: #dc3545; font-weight: 700; font-size: 1.4rem; display: flex; align-items: center; gap: 10px; font-family: 'Segoe UI', sans-serif;">
                            <i class='bx bx-trash' style="font-size: 1.6rem; background: rgba(220, 53, 69, 0.1); padding: 8px; border-radius: 8px; color: #dc3545;"></i>
                            Xóa tài khoản
                        </h4>
                        <button type="button" data-bs-dismiss="modal" class="btnclose modern-close-btn">
                            <i class='bx bx-x'></i>
                        </button>
                    </div>
                    <div class='modal-body modern-modal-body'>
                        <div class="delete-warning">
                            <i class='bx bx-error-circle'></i>
                            <p>Bạn có chắc chắn muốn xóa tài khoản này không? Hành động này không thể hoàn tác.</p>
                        </div>
                        <form method='POST' action="{{route("register.destroy" , ['id' => $employee->id ,"detail" => $detail])}}">
                            <div class="form-group">
                                <label for='cccd_accounts' class="modern-label">
                                    <i class='bx bx-credit-card'></i>
                                    Số CCCD
                                </label>
                                <input id='cccd_accounts' type='text' disabled class='form-control modern-input' value='{{$employee->cccd}}'/>
                            </div>

                            <div class="form-group">
                                <label for='fullname_accounts' class="modern-label">
                                    <i class='bx bx-user'></i>
                                    Họ và tên
                                </label>
                                <input id='fullname_accounts' type='text' class='form-control modern-input' disabled value='{{$employee->name}}' />
                            </div>

                            @csrf
                            <input type='submit' name='delete_account' value='Xác nhận xóa' class='btn modern-delete-btn'>
                        </form>
                    </div>
                    <div class='modal-footer modern-modal-footer'>
                        <button class='btn modern-close-btn-footer' data-bs-dismiss='modal' type='button'>
                            <i class='bx bx-x'></i>
                            Hủy
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endif

