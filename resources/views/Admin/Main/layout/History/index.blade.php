<div class="col-sm-12">
    <div class="row">
        <div class="col-xl-12 col-lg-12 scan-content">
            <div class="scanqr">
                <h3><i class='bx bx-history'></i> Lịch sử đơn hàng</h3>
            </div>
            <div class="history-cards-container">
                @php
                    $stt = 1;
                @endphp
                @forelse ($cart as $row)
                    <div class="history-card">
                        <div class="card-header">
                            <div class="card-number">
                                <span class="number-badge">#{{str_pad($stt, 3, '0', STR_PAD_LEFT)}}</span>
                            </div>
                            <div class="card-actions">
                                <a href="{{route("history.selectCart" , ["id" => $row->idcart , "imageCart" =>  $row->imagecart ])}}" 
                                   class="btn-detail" title="Xem chi tiết">
                                    <i class='bx bx-detail'></i>
                                </a>
                                <a href="#" onclick="openMapLocation('{{$row->addresscart}}')" 
                                   class="btn-map" title="Xem trên bản đồ">
                                    <i class='bx bx-map'></i>
                                </a>
                                <a href="{{route("history.deleteCart" , ["id" => $row->idcart ])}}" 
                                   class="btn-delete" title="Xóa đơn hàng"
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">
                                    <i class='bx bx-trash'></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="user-info">
                                <h4 class="user-name">
                                    <i class='bx bx-user'></i>
                                    {{$row->name}}
                                </h4>
                                <div class="total-amount">
                                    <span class="total-label">Tổng tiền:</span>
                                    <span class="total-value">{{number_format($row->total, 0, ',', '.')}}đ</span>
                                </div>
                            </div>
                            <div class="address-info">
                                <i class='bx bx-map-pin'></i>
                                <span class="address-text" title="{{$row->addresscart}}">{{$row->addresscart}}</span>
                            </div>
                        </div>
                    </div>
                    @php
                        $stt++;
                    @endphp
                @empty
                    <div class="empty-state">
                        <i class='bx bx-inbox'></i>
                        <h3>Chưa có đơn hàng nào</h3>
                        <p>Lịch sử đơn hàng sẽ hiển thị tại đây</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<script>
function openMapLocation(address) {
    if (!address || address.trim() === '') {
        alert('Địa chỉ không hợp lệ');
        return;
    }
    
    const encodedAddress = encodeURIComponent(address);
    const googleMapsUrl = `https://www.google.com/maps/search/?api=1&query=${encodedAddress}`;
    
    window.open(googleMapsUrl, '_blank');
}
</script>

<link rel="stylesheet" href="{{ asset('asset/css/Admin/History_clean.css') }}">

<style>
.empty-state {
    grid-column: 1 / -1;
    text-align: center;
    padding: 60px 20px;
    color: #666;
}

.empty-state i {
    font-size: 64px;
    color: #ccc;
    margin-bottom: 16px;
}

.empty-state h3 {
    margin: 16px 0 8px 0;
    color: #888;
}

.empty-state p {
    margin: 0;
    color: #aaa;
}

body.dark .empty-state {
    color: #bdc3c7;
}

body.dark .empty-state i {
    color: #5a6c7d;
}

body.dark .empty-state h3 {
    color: #95a5a6;
}

body.dark .empty-state p {
    color: #7f8c8d;
}
</style>

