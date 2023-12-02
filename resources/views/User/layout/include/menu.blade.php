<div id="header">
    <!-- Header logo -->
    <div id="header__logo">
      <a href="" class="header__logo-item">
        <img src="{{asset("asset/image/logoBAE.png")}}" alt="">
        <span>BAE</span>
      </a>
    </div>

    <ul id="nav" class="">
      <li class="nav-li"><a href="{{route("home")}}">Trang chủ</a></li>

      @if (isset($user))
        <li class="nav-li"><a href="{{route("cart.index")}}">Giỏ hàng</a></li>

      @endif

      <li class="nav-li"><a href="{{route("blog.index")}}">Thảo luận</a></li>






      @if ($user != null)
        <li class="nav-li" id="signupnav">
            <p>
                <a href="{{route("information.index")}}">{{$user->name}}</a>
            </p>
        </li>
      @else
        <li class="nav-li" id="signupnav">
            <p>
            <a href="{{route("login.get")}}">Đăng nhập<i class="fa-solid fa-person-walking-arrow-loop-left" ></i></a>
            </p>
        </li>
      @endif



    </ul>

    <div class="nav__package">
      <div id="header__nav">
        <!-- Header menu button for responsive -->
        <input type="checkbox" class="menu-btn" id="menu-btn" onclick="opennavbar()" />
        <label for="menu-btn" class="menu-icon">
            <span class="nav__menu-icon"></span>

        </label>

        <!-- Header navigation -->

      </div>

      <!-- Header gift -->
      <div id="btn-active">
        @if ($user != null)
            <div class="InOut">
                <p style="margin-bottom: 0px ;" id="nameclientx"><a href="{{route("information.index")}}">{{$user->name}}</a></p>
            </div>
        @else
            <div class="InOut">
                <a href="{{route("login.get")}} ">Đăng nhập<i class="fa-solid fa-person-walking-arrow-loop-left" ></i></a>

            </div>
        @endif


      </div>
    </div>
  </div>

  <script src="{{asset("asset/javascript/User/open.js")}}"></script>
