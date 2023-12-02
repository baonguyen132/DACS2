<div id="history">
    <h1 class="history__tittle top-animation">Lịch sử</h1>
    <hr />
    <p class="history__thanks bottom-animation" style="padding: 12px 0">
    Cảm ơn những đóng góp của bạn.
    </p>
    <p class="history__thanks bottom-animation">
    Bảo vệ môi trường là trách nhiệm cũng như nghĩa vụ của mỗi cá nhân, chỉ
    một hành động nhỏ sẽ tạo ra một sức mạnh lớn giúp bảo vệ sự sống cho
    toàn nhân loại
    </p>

    <div class="swiper mySwiper myhistory__container">
    <div class="swiper-wrapper myhistory__wrap">
        <!-- slide 1 -->


        @foreach ($cart as $key => $row)
            <div class="swiper-slide myhistory">
                <div class="myhistory__item-bg">
                    @if ($key == 0)
                        <img src="{{asset("asset/image/History/history3.jpg")}}" alt="">
                    @endif
                    @if ($key == 1)
                        <img src="{{asset("asset/image/History/history4.jpg")}}" alt="">
                    @endif
                    @if ($key == 2)
                        <img src="{{asset("asset/image/History/history5.jpg")}}" alt="">
                    @endif

                </div>

                <div class="myhistory__item-info">
                    <div class="myhistory__item-time">
                    <div class="myhistory__item-hours">
                        <span style="font-weight: 700; font-size: 20px" >Thời gian: </span>
                        {{$row["created_at"]}}
                    </div>
                    <span></span>
                    </div>
                    <div class="myhistory__item-qt">
                        <p class="myhistory__item-type">
                            <span style="font-weight: 700; font-size: 20px">Trạng thái:</span>
                            @if ($row["token"] != "NULL")
                                <span style="color: red;">Chưa</span>
                            @else
                                <span style="color: green;">Rồi</span>
                            @endif
                        </p>
                    <p class="myhistory__item-quantity">


                    </p>
                    </div>
                    <p class="myhistory__item-point">
                        <span style="font-weight: 700; font-size: 20px">Điểm:</span>
                        {{$row["total"]}}
                    </p>
                </div>

                <div class="myhistory__item-progress-bar">

                    @if ($row["total"] / 100 <= 0.2 )
                        <div class="myhistory__item-progress-status" style="--mau-pin: #da1e1e; width: {{$row["total"] }}%" ></div>
                    @else
                        @if ($row["total"] / 100 <= 0.5  )
                        <div class="myhistory__item-progress-status" style="--mau-pin: #ef8f00; width: {{$row["total"]  }}%" ></div>
                        @else
                            @if ($row["total"] / 100 > 0.5 && $row["total"] / 100 <= 1  )
                            <div class="myhistory__item-progress-status" style="--mau-pin: #2bbe5c; width: {{$row["total"] / 100 }}%" ></div>
                            @else
                            <div class="myhistory__item-progress-status" style="--mau-pin: #2bbe5c; width: 100%" ></div>
                            @endif

                        @endif
                    @endif


                </div>

                <a href="{{route("historyuser.detail" , ["id" => $row["id"] ])}}#history" class="myhistory__item-link" style="--mau-pin: #158d63; ">
                    <span>View All</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        @endforeach






    </div>
    <div class="page" >
        <button class="back" onclick="back()">
            <i class='bx bx-chevrons-left' ></i>
        </button>
        <input type="number" class="page" inputmode="numeric" onchange="setPage(event , {{$count}})" min="1" value="{{$pageHistory}}" id="page">

        <button class = "next">
            <i class='bx bx-chevrons-right' onclick="next({{$count}})" ></i>
        </button>
    </div>
</div>
<!-- Swiper JS -->

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    autoplay: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

    breakpoints: {
        0: {
        slidesPerView: 1,
        },
        520: {
        slidesPerView: 2,
        },
        950: {
        slidesPerView: 3,
        },
    },
    });
</script>
