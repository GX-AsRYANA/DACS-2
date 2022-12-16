<?php
if(isset($_GET['id'])&&isset($_GET['file'])){
    $file=$_GET['file'];
    $id=$_GET['id'];
$conn = mysqli_connect("localhost","root","","dacs");
if($conn->connect_error){
    die("kết nối ko thành công:". $conn->connect_error);
}
$sql="DELETE FROM `food` WHERE id=$id";
$kq= mysqli_query($conn, $sql);
unlink($file);
}
    if(isset($_GET['iddc'])){
    $id=$_GET['iddc'];
    $conn = mysqli_connect("localhost","root","","dacs");
    if($conn->connect_error){
    die("kết nối ko thành công:". $conn->connect_error);
    }
    $sql="DELETE FROM `address` WHERE id=$id";
    $kq= mysqli_query($conn, $sql);
}
    header("Location:../admin.php");
    if(isset($_GET['id_cmt'])){
        $id=$_GET['id_cmt'];
        $conn = mysqli_connect("localhost","root","","dacs");
        if($conn->connect_error){
        die("kết nối ko thành công:". $conn->connect_error);
        }
        $sql="DELETE FROM `comment` WHERE id=$id";
        $kq= mysqli_query($conn, $sql);
        header("Location:../QL_cmt.php");
    }
?>