@extends('admin/main/format')

@section('head')
    <link rel="stylesheet" href="{{asset("asset/css/Admin/Home.css")}}">
@endsection

@section('content')
<div class="col-sm-12">
    <div class="row group-information">
        <div class=" information">
            <div class="content-information">
                <div class="number">
                    <div class="number-number">
                        <h1>{{$Cbattery}}</h1>

                    </div>
                    <div class="image-number">
                        <i id="battery" class='bx bxs-battery-charging' ></i>
                    </div>
                </div>
                <div class="title-number">
                    <a href="">
                        <h4>Battery</h4>
                        <i class='bx bx-right-arrow' ></i>
                    </a>

                </div>

            </div>
        </div>
        <div class=" information">
            <div class="content-information">
                <div class="number">
                    <div class="number-number">
                        <h1>{{$Cvoucher}}</h1>

                    </div>
                    <div class="image-number">
                        <i class='bx bx-credit-card-front'></i>
                    </div>
                </div>
                <div class="title-number">
                    <a href="">
                        <h4>Voucher</h4>
                        <i class='bx bx-right-arrow' ></i>
                    </a>

                </div>
            </div>
        </div>
        <div class=" information">
            <div class="content-information">
                <div class="number">
                    <div class="number-number">
                        <h1>{{$Cuser}}</h1>

                    </div>
                    <div class="image-number">
                        <i class='bx bx-user' ></i>
                    </div>
                </div>
                <div class="title-number">
                    <a href="">
                        <h4>User</h4>
                        <i class='bx bx-right-arrow' ></i>
                    </a>

                </div>
            </div>
        </div>
        <div class=" information">
            <div class="content-information">
                <div class="number">
                    <div class="number-number">
                        <h1></h1>

                    </div>
                    <div class="image-number">
                        <i class='bx bx-comment-detail'></i>
                    </div>
                </div>
                <div class="title-number">
                    <a href="">
                        <h4>Comment</h4>
                        <i class='bx bx-right-arrow' ></i>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="row group-comment-calendar">
        <div class="comment">
            <div class="content-comment">
                <div class="title-comment">
                    <h3>Comment</h3>
                </div>
                <div class="list-comment">
                    <div class="list">
                        <div class = "name">
                            Lê Văn Sĩ
                        </div>
                        <div class = "contentlist">
                            Tôi muốn chia sẻ với mọi người về trải nghiệm của mình với một trang web thu thập pin bảo vệ môi trường đáng kinh ngạc mà tôi đã tìm thấy gần đây. Trang web này không chỉ là một nguồn cung cấp pin tái chế chất lượng cao mà còn có một tầm nhìn rõ ràng về sự bảo vệ môi trường.

                        </div>
                    </div>
                    <div class="list">
                        <div class = "name">
                            Lê Quang Nhật
                        </div>
                        <div class = "contentlist">
                            Tôi muốn chia sẻ với mọi người về trải nghiệm của mình với một trang web thu thập pin bảo vệ môi trường đáng kinh ngạc mà tôi đã tìm thấy gần đây. Trang web này không chỉ là một nguồn cung cấp pin tái chế chất lượng cao mà còn có một tầm nhìn rõ ràng về sự bảo vệ môi trường.

                        </div>
                    </div>
                    <div class="list">
                        <div class = "name">
                            Võ Thị Thanh Thư
                        </div>
                        <div class = "contentlist">
                            Tôi muốn chia sẻ với mọi người về trải nghiệm của mình với một trang web thu thập pin bảo vệ môi trường đáng kinh ngạc mà tôi đã tìm thấy gần đây. Trang web này không chỉ là một nguồn cung cấp pin tái chế chất lượng cao mà còn có một tầm nhìn rõ ràng về sự bảo vệ môi trường.

                        </div>
                    </div>
                </div>
                <div class="see">
                    <p><a href="#">Xem thêm <i class='bx bxs-caret-right-circle'></i> </a></p>
                </div>
            </div>
        </div>
        <div class="calendar">
            <div class="content-calendar" id= "content-calendar" >
                <link rel="stylesheet" href="{{asset("asset/css/Admin/dycalendar.css")}}">

                <div id = "dycalender"></div>

                <script src = "{{asset("asset/javascript/dycalendar.js")}}"></script>
                <script>
                    const x = document.getElementById('content-calendar');
                    console.log(screen.availWidth) ;
                    if(x.offsetWidth < 456){
                        dycalendar.draw({
                        target: '#dycalender' ,
                        type: 'day' ,
                        highlighttargetdate: true ,
                        prevnextbutton: 'show' ,

                        })
                    }
                    else {
                        dycalendar.draw({
                        target: '#dycalender' ,
                        type: 'month' ,
                        highlighttargetdate: true ,
                        prevnextbutton: 'show' ,

                        })
                    }

                </script>
            </div>
        </div>
    </div>
    <div class= "row chart">
        <div class="history">
            <div class="content-history">
                <h3>Collection courtesy chart</h3>
                <div class="char-history">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                    <canvas id="myChart"></canvas>

                    <script src="{{asset("asset/javascript/chart1.js")}}"></script>

                </div>
            </div>
        </div>
        <div class = "numberuser">

        </div>
    </div>

</div>

@endsection
