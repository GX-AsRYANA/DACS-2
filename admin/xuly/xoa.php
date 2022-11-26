<?php
    if(isset($_GET['id'])&&isset($_GET['file'])){
        $file=$_GET['file'];
        $id=$_GET['id'];}
    $conn = mysqli_connect("localhost","root","","dacs");
    if($conn->connect_error){
        die("kết nối ko thành công:". $conn->connect_error);
    }
    $sql="DELETE FROM `food` WHERE id=$id";
    $kq= mysqli_query($conn, $sql);
    unlink($file);

    header("Location:../admin.php");
?>