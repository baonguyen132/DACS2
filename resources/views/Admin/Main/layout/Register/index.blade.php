
<div class = "row list_employee">
    <div class="listChoose">
        <button><a href="{{route("register.index" , ["detail" => "employee"])}}">Employee</a></button>
        <button><a href="{{route("register.index" , ["detail" => "customer"])}}">Customer</a></button>
        <button><a href="{{route("register.index" , ["detail" => "unconfirmed"])}}">Unconfirmed</a></button>
    </div>
    @foreach ($data as $item)
        <div class = "employee col-xl-4 col-lg-6">
            <div class="one_employee">
                <div class = "image_employee">
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
                <div class = "information">
                    <h5>{{$item["name"]}}</h5>
                    <p><b>- Citizen ID: </b>{{$item["cccd"]}}</p>
                    <p><b>- Date of birth: </b>{{$item["dob"]}}</p>
                    @if ($item->status == 0 || $item->status == 50)
                        <form action="{{route("register.destroy" , ['id' => $item->id , "detail" =>$detail  ])}}" method="POST">
                            <button style="background: red; width: max-content ; color: white" type="submit">Delete</button>
                            @csrf
                        </form>
                    @else
                        <button><a href = "{{route('register.show' , ['id' => $item->id , "detail" => $detail])}}" >View</a></button>
                    @endif

                </div>
            </div>
        </div>

    @endforeach
</div>
@if ($detail == "employee")
    <div class="viewInsert">
        <button type = "button" class="viewInsertButton">
            <a href="{{route("register.create")}}">
                <i class='bx bx-plus'></i>
            </a>
        </button>
    </div>
@endif

