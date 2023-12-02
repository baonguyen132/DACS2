<div class="confirm">
    <div class="form col-xl-4 col-lg-3 col-md-3 col-sm-12">
        <div class="scanqr">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <main class="scan">
                <div id="reader"></div>
                <div id="result"></div>

            </main>
            <div class="content-scan">

            </div>
            <script src="{{asset("asset/javascript/scanner.js")}}"></script>
        </div>
    </div>
    <div class = "listcart col-xl-8 col-lg-9 col-md-9 col-sm-12">
        <section class="">
            <ul class="products">
                @foreach ($detail as $row)
                    <li class="rows" id="li">
                        <div class="col left">
                            <div class="thumbnail">
                                <img src="{{asset("storage/image/Battery/$row->image.jpg")}}" alt="">
                            </div>
                            <div class="detail">
                                <div class="name"><a href="#">{{$row->name_battery}}</a></div>
                                <div class="description">
                                    <ul>
                                        <li><b>Shape: {{$row->shape}}</b> </li>
                                        <li><b>Size: {{$row->size}}</b> </li>
                                    </ul>
                                </div>
                                <div class="price"></div>
                            </div>
                        </div>
                        <div class="col right">
                            <div class="quantity">
                                <input type="number" class="quantity" step="1" value="{{$row->count}}" >
                            </div>

                        </div>
                    </li>
                @endforeach

            </ul>
        </section>
    </div>

</div>
