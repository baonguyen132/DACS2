<div class="information">
    <h3>Thông tin</h3>
    <p><b>+ Họ tên:</b> {{$user->name}}</p>
    <p><b>+ Căn cước:</b> {{$user->cccd}}</p>
    <p><b>+ Point:</b> {{$user->point}}</p>
</div>
<div class="menu">
    <h3>Menu</h3>
    <ul>
        <li><a href="{{route("information.index")}}">Tài khoản</a></li>
        <li><a href="{{route("exchange.branch")}}">Quy đổi</a></li>
        <li><a href="{{route("historyuser.index" , ["page" => 1])}}">Lịch sử</a></li>
        <li><a href="{{route("exchange.listVoucher" , ["page" => 1])}}">Quà quy đổi</a></li>
        <li class="nav-li"><a href="{{route("login.logout")}}">Đăng xuất</a></li>
    </ul>
</div>
