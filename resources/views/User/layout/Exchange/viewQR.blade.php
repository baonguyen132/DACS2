<style>
    body{
        display: flex;
        justify-content: center;
        align-items: center;

        margin: 0px;
        height: 100vh;
    }

</style>
@php
    if(file_exists(public_path("storage/image/QRCode/$image.txt")))
    {
        $fp = fopen(public_path("storage/image/QRCode/$image.txt"), "r");//mở file ở chế độ đọc

        while(! feof($fp)) {
            echo fgets($fp);
        }

        fclose($fp);
    }
    else {
        echo "không tồn tại file" ;
    }

@endphp
