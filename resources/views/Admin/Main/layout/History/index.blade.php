<div class="col-sm-12">
    <div class="row">

        <div class = "col-xl-12 col-lg-12 scan-content" >
            <div class="scanqr">
                <h3>Browsing history</h3>
            </div>
            <div class="list" style="height: 100px">
                <table class="table table-hover">
                    <thead>
                        <th>No</th>
                        <th>User's name</th>
                        <th>Total</th>
                        <th>Address</th>
                        <th>Detail</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @php
                            $stt = 1 ;
                        @endphp
                        @foreach ($cart as $row)
                            <tr>
                                <td>{{$stt}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->total}}</td>
                                <td>{{$row->addresscart}}</td>
                                <td><a href="{{route("history.selectCart" , ["id" => $row->idcart , "imageCart" =>  $row->imagecart ])}}">Chi tiết</a></td>
                                <td><a href="{{route("history.deleteCart" , ["id" => $row->idcart ])}}">Xoá</a></td>
                            </tr>
                            @php
                                $stt ++ ;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

