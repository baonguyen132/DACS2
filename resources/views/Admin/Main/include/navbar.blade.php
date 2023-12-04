<nav class="slidebar">
    <header>
      <div class="image-text">
        <div class="image">
          <span class="firstandsecond"><?php //if(isset($_SESSION["Account"])) echo $_SESSION["Account"][2] ;?></span>
        </div>

        <div class="text header-text">
          <span class="name">
            Battery-Environment
          </span>
          <span class="profession">
            {{$user->name}}
          </span>
        </div>
      </div>

      <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
      <div class="menu">
        <li class="search-box">
          <i class='bx bx-search-alt icon' ></i>
          <input type="search" placeholder="Search...">
        </li>
        <ul class="menu-links">
          <li class="nav-links">
            <a href="{{route("admin.index")}}">
              <i class='bx bx-home-alt icon'></i>
              <span class="text nav-text">
                  Home
              </span>
            </a>
          </li>
          <li class="nav-links">
            <a href="{{route("register.index" , ["detail" => "employee"]) }}">
              <i class="material-icons icon">person</i>
              <span class="text nav-text">
                  User
              </span>
            </a>
          </li>
          <li class="nav-links">
            <a href="{{route("battery.index")}}">
              <i class='bx bxs-battery-charging icon'></i>
              <span class="text nav-text">
                Battery
              </span>
            </a>
          </li>
          <li class="nav-links">
            <a href="{{route("voucher.index")}}"  >
            <i class='bx bxs-id-card icon'></i>
              <span class="text nav-text" >
                  Voucher
              </span>
            </a>
          </li>
          <li class="nav-links">
            <a href="{{route("history.index")}}">
              <i class='bx bx-history icon' ></i>
              <span class="text nav-text">
                  History
              </span>
            </a>
          </li>
          <li class="nav-links">
            <a href="{{route("setting.index")}}">
              <i class='bx bxs-cog icon'></i>
              <span class="text nav-text">
                  Setting
              </span>
            </a>
          </li>

        </ul>
      </div>

      <div class="bottom-content">
        <li class="">
          <a href="{{route("admin.logout")}}">
          <i class='bx bx-log-out icon'></i>
          <span class="text nav-text">
            Log out
          </span>
          </a>
        </li>

        <li class="mode">
          <div class="moon-sun">
            <i class='bx bx-moon moon icon'></i>
            <i class='bx bx-sun sun icon'></i>
          </div>

          <span class="mode-text text">Dark Mode</span>

          <div class="toggle-width" >
            <span class="switch"></span>
          </div>
        </li>


        <script src="{{asset("/asset/javascript/navbar.js")}}"></script>

      </div>

    </div>
  </nav>
