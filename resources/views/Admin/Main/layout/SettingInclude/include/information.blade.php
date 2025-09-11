<div class="modern-info-container" id="my_information">
    <!-- Header Section -->
    <div class="info-header">
        <div class="header-gradient">
            <i class='bx bx-user-circle info-icon'></i>
            <h2>Thông tin cá nhân</h2>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="info-content-grid">
        <!-- Personal Information Card -->
        <div class="info-card personal-card">
            <div class="card-header">
                <i class='bx bx-id-card'></i>
                <h3>Thông tin cơ bản</h3>
            </div>
            <div class="form-grid">
                <div class="form-group">
                    <label for="infor_name">Họ và tên</label>
                    <input type="text" class="modern-input" name="fullname_infor" id="infor_name" value="{{$user->name}}" required autocomplete="off" form="upload_my_information">
                </div>
                
                <div class="form-group">
                    <label for="dateofbirth_information">Ngày sinh</label>
                    <input type="date" class="modern-input" required name="dateofbirth_information" value="{{$user->dob}}" form="upload_my_information">
                </div>

                <div class="form-group gender-group">
                    <label>Giới tính</label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="gender_information" @if ($user->gender == "Male") checked @endif value="Male" required id="male" form="upload_my_information">
                            <span class="radio-custom"></span>
                            Nam
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="gender_information" @if ($user->gender == "Female") checked @endif value="Female" required id="female" form="upload_my_information">
                            <span class="radio-custom"></span>
                            Nữ
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Image Card -->
        <div class="info-card image-card">
            <div class="card-header">
                <i class='bx bx-image'></i>
                <h3>Ảnh đại diện</h3>
            </div>
            <div class="image-upload-area">
                @if ($upload_card_image == NULL)
                    <div class="upload-placeholder">
                        <i class='bx bx-cloud-upload'></i>
                        <p>Tải lên ảnh đại diện</p>
                        <input type="file" name="upload_card_image" required autocomplete="off" form="upload_my_information" class="file-input">
                    </div>
                @else
                    <div class="image-preview">
                        <img src="{{$upload_card_image}}" alt="Profile Image">
                        <div class="image-overlay">
                            <i class='bx bx-edit'></i>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- CCCD Information Card -->
        <div class="info-card cccd-card">
            <div class="card-header">
                <i class='bx bx-card'></i>
                <h3>Căn cước công dân</h3>
            </div>
            <div class="form-group">
                <label for="citizen_identification">Số CCCD</label>
                <input type="text" name="citizen_identification" class="modern-input disabled" id="citizen_identification" value="{{$user->cccd}}" disabled required form="upload_my_information">
            </div>
            
            <div class="cccd-images">
                <div class="cccd-side">
                    <label>Mặt trước CCCD</label>
                    @if ($citizen_identification_front == NULL)
                        <div class="cccd-upload">
                            <i class='bx bx-upload'></i>
                            <span>Tải lên mặt trước</span>
                            <input type="file" name="citizen_identification_front" required autocomplete="off" form="upload_my_information">
                        </div>
                    @else
                        <div class="cccd-preview">
                            <img src="{{$citizen_identification_front}}" alt="Front CCCD">
                        </div>
                    @endif
                </div>

                <div class="cccd-side">
                    <label>Mặt sau CCCD</label>
                    @if ($citizen_identification_back == NULL)
                        <div class="cccd-upload">
                            <i class='bx bx-upload'></i>
                            <span>Tải lên mặt sau</span>
                            <input type="file" name="citizen_identification_back" required autocomplete="off" form="upload_my_information">
                        </div>
                    @else
                        <div class="cccd-preview">
                            <img src="{{$citizen_identification_back}}" alt="Back CCCD">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Address Information Card -->
        <div class="info-card address-card">
            <div class="card-header">
                <i class='bx bx-map'></i>
                <h3>Thông tin địa chỉ</h3>
            </div>
            <div class="form-grid">
                <div class="form-group">
                    <label for="place_brith">Nơi sinh</label>
                    <input type="text" name="my_placeofbrith" required value="{{$user->pob}}" autocomplete="off" class="modern-input" id="place_brith" form="upload_my_information">
                </div>

                <div class="form-group">
                    <label for="accommodation_infor">Địa chỉ hiện tại</label>
                    <input type="text" name="accommodation_infor" value="{{$user->address}}" required autocomplete="off" class="modern-input" id="accommodation_infor" form="upload_my_information">
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Section -->
    <div class="submit-section">
        <form method="POST" action="{{route('setting.updateInformation')}}" enctype="multipart/form-data" id="upload_my_information">
            @csrf
            <button type="submit" name="submit_my_information" class="submit-btn">
                <i class='bx bx-save'></i>
                Cập nhật thông tin
            </button>
        </form>
    </div>
</div>
