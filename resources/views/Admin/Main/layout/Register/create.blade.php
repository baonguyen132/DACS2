<!-- Modern Create Form Container -->
<div class="modern-create-container">
   
    <!-- Main Form -->
    <div class="create-form-wrapper">
        <form method="POST" action="{{route('register.store')}}" class="modern-create-form">
            
            <!-- Full Name Field -->
            <div class="form-group-modern">
                <label for="fullname" class="modern-label">
                    <i class='bx bx-user'></i>
                    <span>Họ và tên</span>
                </label>
                <div class="input-wrapper">
                    <input type="text" 
                           name="fullname" 
                           id="fullname" 
                           class="modern-input" 
                           placeholder="Nhập họ và tên đầy đủ" 
                           required 
                           autofocus="autofocus">
                    <div class="input-border"></div>
                </div>
                @error('fullname')
                    <div class="error-message">
                        <i class='bx bx-error-circle'></i>
                        <span>{{$message}}</span>
                    </div>
                @enderror
            </div>

            <!-- CCCD Field -->
            <div class="form-group-modern">
                <label for="citizen_identification" class="modern-label">
                    <i class='bx bx-id-card'></i>
                    <span>Số căn cước công dân</span>
                </label>
                <div class="input-wrapper">
                    <input type="text" 
                           name="CCCD" 
                           id="citizen_identification" 
                           class="modern-input" 
                           placeholder="Nhập số CCCD (12 chữ số)" 
                           required 
                           autocomplete="off">
                    <div class="input-border"></div>
                </div>
                @error('CCCD')
                    <div class="error-message">
                        <i class='bx bx-error-circle'></i>
                        <span>{{$message}}</span>
                    </div>
                @enderror
            </div>

            <!-- Date of Birth Field -->
            <div class="form-group-modern">
                <label for="date" class="modern-label">
                    <i class='bx bx-calendar'></i>
                    <span>Ngày sinh</span>
                </label>
                <div class="input-wrapper">
                    <input type="date" 
                           id="date" 
                           name="dateofbirth" 
                           class="modern-input date-input" 
                           required 
                           autofocus="autofocus">
                    <div class="input-border"></div>
                </div>
                @error('dateofbirth')
                    <div class="error-message">
                        <i class='bx bx-error-circle'></i>
                        <span>{{$message}}</span>
                    </div>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="form-group-modern">
                <label for="email" class="modern-label">
                    <i class='bx bx-envelope'></i>
                    <span>Email</span>
                </label>
                <div class="input-wrapper">
                    <input type="email" 
                           name="gmail" 
                           id="email" 
                           class="modern-input" 
                           placeholder="example@company.com" 
                           required>
                    <div class="input-border"></div>
                </div>
                @error('gmail')
                    <div class="error-message">
                        <i class='bx bx-error-circle'></i>
                        <span>{{$message}}</span>
                    </div>
                @enderror
            </div>

            @csrf
            
            <!-- Submit Section -->
            <div class="submit-section">
                <button type="submit" class="modern-submit-btn">
                    <i class='bx bx-save'></i>
                    <span>Tạo tài khoản</span>
                    <div class="btn-ripple"></div>
                </button>
                
                <a href="{{route('register.index', ['detail' => 'employee'])}}" class="modern-cancel-btn">
                    <i class='bx bx-x'></i>
                    <span>Hủy bỏ</span>
                </a>
            </div>

            <!-- Success/Error Messages -->
            @if (Session::has("result"))
                <div class="result-message {{ Session::get('result') ? 'success' : 'error' }}">
                    <i class='bx {{ Session::get('result') ? "bx-check-circle" : "bx-error-circle" }}'></i>
                    <span>{{ Session::get("result") }}</span>
                </div>
            @endif
        </form>
    </div>
</div>

<!-- Keep original form hidden for backward compatibility -->
<div style="display: none;">
    <form method="POST" action="{{route('register.store')}}" >
        <div class="row">
            <div class="col-sm-12 mb-2">
                <label style="float:left;" id="name" for="fullname" class="mb-2">Fullname</label>
                <div class="form-floating">
                    <input type="text" name="fullname" required placeholder="Full name" id="fullname" class="form-control" autofocus="autofocus">
                </div>
                @error('fullname')
                    {{$message}}
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 mb-2">
                <label for = "citizen_identification" id="cid" class="mb-2" for="citizen_identification">Citizen identification</label>
                <div class = "form-floating">
                    <input type="text" name = "CCCD" class = "form-control" placeholder ="citizen identification " required id="citizen_identification" value="" autofocus = "autofocus" autocomplete="off" >
                </div>
                @error('CCCD')
                    {{$message}}
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-2">
                <label style="float:left;" id="labeldate" for="date" class="mb-2">Date of birth</label>
                <div class="form-floating">
                    <input type="date" id="date" value="" name="dateofbirth" required class="datebirth" autofocus="autofocus">
                </div>
                @error('dateofbirth')
                    {{$message}}
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-2">
                <label id="gmail" class="mb-2" for="email">Gmail</label>
                <div class="form-floating">
                    <input type="email" class = 'form-control' id="email" required placeholder="Gmail" name="gmail" >
                </div>
                @error('gmail')
                    {{$message}}
                @enderror
            </div>
        </div>

        @csrf
        <input type="submit" class="btn createaccount mb-2" value="Import account">
        @if (Session::has("result"))
            {{
                Session::get("result")
            }}
        @endif
    </form>
</div>
