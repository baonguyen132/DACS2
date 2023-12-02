
<div class = "row list_employee">
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
                    <button><a href = "{{route('register.show' , ['id' => $item->id])}}" >View</a></button>
                </div>
            </div>
        </div>

    @endforeach
</div>


