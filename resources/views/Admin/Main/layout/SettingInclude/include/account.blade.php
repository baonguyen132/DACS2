<div class="modern-account-container" id="information_account">
    <!-- Header Section -->
    <div class="account-header">
        <div class="header-gradient">
            <i class='bx bx-user-check account-icon'></i>
            <h2>Thông tin tài khoản</h2>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="account-content-grid">
        <!-- User Information Card -->
        <div class="account-card info-display-card">
            <div class="card-header">
                <i class='bx bx-info-circle'></i>
                <h3>Thông tin cá nhân</h3>
            </div>
            <div class="user-info-list">
                <div class="info-item">
                    <div class="info-label">
                        <i class='bx bx-user'></i>
                        <span>Họ và tên:</span>
                    </div>
                    <div class="info-value">{{$user->name}}</div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class='bx bx-id-card'></i>
                        <span>Số CCCD:</span>
                    </div>
                    <div class="info-value">{{$user->cccd}}</div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class='bx bx-briefcase'></i>
                        <span>Vị trí công việc:</span>
                    </div>
                    <div class="info-value">
                        <span class="no-data">Chưa cập nhật</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Password Update Card -->
        <div class="account-card password-card">
            <div class="card-header">
                <i class='bx bx-lock-alt'></i>
                <h3>Cập nhật mật khẩu</h3>
            </div>
            
            <form method="POST" action="{{route('setting.updatePassword')}}" class="password-form">
                <div class="form-group">
                    <label for="oldpassword">
                        <i class='bx bx-key'></i>
                        Mật khẩu cũ
                    </label>
                    <div class="input-wrapper">
                        <input type="password" name="oldpassword" class="modern-input" id="oldpassword" placeholder="Nhập mật khẩu cũ" required autocomplete="off" value="">
                        <i class='bx bx-hide toggle-password' data-target="oldpassword"></i>
                    </div>
                    @error('oldpassword')
                        <div class="error-message">
                            <i class='bx bx-error-circle'></i>
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="newpassword">
                        <i class='bx bx-lock'></i>
                        Mật khẩu mới
                    </label>
                    <div class="input-wrapper">
                        <input type="password" name="newpassword" class="modern-input" id="newpassword" placeholder="Nhập mật khẩu mới" required autocomplete="off" value="">
                        <i class='bx bx-hide toggle-password' data-target="newpassword"></i>
                    </div>
                    @error('newpassword')
                        <div class="error-message">
                            <i class='bx bx-error-circle'></i>
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="confirmpassword">
                        <i class='bx bx-lock-open'></i>
                        Xác nhận mật khẩu
                    </label>
                    <div class="input-wrapper">
                        <input type="password" name="confirmpassword" class="modern-input" id="confirmpassword" placeholder="Nhập lại mật khẩu mới" required autocomplete="off" value="">
                        <i class='bx bx-hide toggle-password' data-target="confirmpassword"></i>
                    </div>
                    @error('confirmpassword')
                        <div class="error-message">
                            <i class='bx bx-error-circle'></i>
                            {{$message}}
                        </div>
                    @enderror
                </div>

                @csrf
                
                <div class="submit-section">
                    <button type="submit" name="submit_upload_account" class="submit-btn">
                        <i class='bx bx-save'></i>
                        Cập nhật mật khẩu
                    </button>
                </div>

                @if (Session::has("result"))
                    <div class="result-message">
                        <i class='bx bx-check-circle'></i>
                        {{ Session::get("result") }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>

<script>
// Toggle password visibility
document.addEventListener('DOMContentLoaded', function() {
    const toggleButtons = document.querySelectorAll('.toggle-password');
    
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);
            
            if (input.type === 'password') {
                input.type = 'text';
                this.className = 'bx bx-show toggle-password';
            } else {
                input.type = 'password';
                this.className = 'bx bx-hide toggle-password';
            }
        });
    });
});
</script>
