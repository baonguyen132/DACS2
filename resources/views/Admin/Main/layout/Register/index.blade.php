
<div class="row list_employee modern-employee-grid">
    <div class="listChoose modern-filter-tabs">
        <div class="filter-header">
            <i class='bx bx-filter-alt'></i>
            <span>Lọc theo loại tài khoản</span>
        </div>
        <div class="filter-buttons">
            <button class="filter-btn"><a href="{{route("register.index" , ["detail" => "employee"])}}"><i class='bx bx-user-circle'></i>Nhân viên</a></button>
            <button class="filter-btn"><a href="{{route("register.index" , ["detail" => "customer"])}}"><i class='bx bx-group'></i>Khách hàng</a></button>
            <button class="filter-btn"><a href="{{route("register.index" , ["detail" => "unconfirmed"])}}"><i class='bx bx-time-five'></i>Chưa xác nhận</a></button>
        </div>
    </div>
    @foreach ($data as $item)
        <div class="employee col-xl-4 col-lg-6 modern-employee-card">
            <div class="modern-card-wrapper">
                <div class="card-status-indicator"></div>
                <div class="one_employee modern-employee-item">
                    <div class="image_employee modern-avatar-section">
                        <div class="avatar-frame">
                            <div class="avata-employee modern-avatar" style="background-image: url(<?php
                                    if(file_exists(public_path("storage/upload/" . $item["cccd"] . "/upload_image_avata.jpg"))){
                                        echo asset("storage/upload/".$item["cccd"]."/upload_image_avata.jpg") ;
                                    }
                                    else {
                                        echo "https://nhanvietluanvan.com/wp-content/uploads/2023/05/c6e56503cfdd87da299f72dc416023d4-736x620.jpg" ;
                                    }
                                ?>)">
                            </div>
                            <div class="status-badge status-{{ $item->status == 0 || $item->status == 50 ? 'pending' : 'active' }}">
                                <i class='bx {{ $item->status == 0 || $item->status == 50 ? "bx-time-five" : "bx-check-circle" }}'></i>
                            </div>
                        </div>
                        <div class = "avata-employee" style = "background-image: url(<?php
                                if(file_exists(public_path("storage/upload/" . $item["cccd"] . "/upload_image_avata.jpg"))){
                                    echo asset("storage/upload/".$item["cccd"]."/upload_image_avata.jpg") ;
                                }
                                else {
                                    echo "https://nhanvietluanvan.com/wp-content/uploads/2023/05/c6e56503cfdd87da299f72dc416023d4-736x620.jpg" ;
                                }
                            ?>)">
                        </div>
                    </div>
                <div class="information modern-info-section">
                    <div class="employee-header">
                        <h5 class="employee-name">{{$item["name"]}}</h5>
                        <div class="employee-role">
                            <i class='bx bx-badge'></i>
                            <span>{{ $item->status == 0 || $item->status == 50 ? 'Chưa xác nhận' : 'Đã xác nhận' }}</span>
                        </div>
                    </div>
                    <div class="employee-details">
                        <div class="detail-item">
                            <i class='bx bx-credit-card'></i>
                            <span class="detail-label">CCCD:</span>
                            <span class="detail-value">{{$item["cccd"]}}</span>
                        </div>
                        <div class="detail-item">
                            <i class='bx bx-calendar'></i>
                            <span class="detail-label">Ngày sinh:</span>
                            <span class="detail-value">{{$item["dob"]}}</span>
                        </div>
                    </div>
                    <div class="action-section">
                        @if ($item->status == 0 || $item->status == 50)
                            <form action="{{route("register.destroy" , ['id' => $item->id , "detail" =>$detail  ])}}" method="POST" class="delete-form">
                                <button class="modern-action-btn delete-btn" type="submit">
                                    <i class='bx bx-trash'></i>
                                    <span>Xóa</span>
                                </button>
                                @csrf
                            </form>
                            <button style="background: red; width: max-content ; color: white" type="submit">Delete</button>
                        @else
                            <a href="{{route('register.show' , ['id' => $item->id , "detail" => $detail])}}" class="modern-action-btn view-btn">
                                <i class='bx bx-show'></i>
                                <span>Xem chi tiết</span>
                            </a>
                        @endif
                    </div>

                </div>
            </div>
            </div>
        </div>

    @endforeach
</div>
@if ($detail == "employee")
    <!-- Enhanced Floating Create Section -->
    <div class="enhanced-floating-create">
        <div class="floating-tooltip">Tạo nhân viên mới</div>
        <button class="floating-create-main pulse-animation">
            <a href="{{route("register.create")}}">
                <i class='bx bx-plus'></i>
            </a>
        </button>
    </div>
    
    

    
@endif

