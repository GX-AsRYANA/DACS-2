<?php
    $conn = mysqli_connect('localhost','root','','dacs');   
        if($conn->connect_error){
            die("kết nối ko thành công:". $conn->connect_error);
        }
?>