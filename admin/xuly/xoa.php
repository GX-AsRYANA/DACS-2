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
    header("Location:../admin.php");
}
    if(isset($_GET['iddc'])){
    $id=$_GET['iddc'];
    $conn = mysqli_connect("localhost","root","","dacs");
    if($conn->connect_error){
    die("kết nối ko thành công:". $conn->connect_error);
    }
    $sql="DELETE FROM `address` WHERE id=$id";
    $kq= mysqli_query($conn, $sql);
    header("Location:../admin.php");
}
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
if(isset($_GET['id_pcmt'])){
    $id=$_GET['id_pcmt'];
    $conn = mysqli_connect("localhost","root","","dacs");
    if($conn->connect_error){
    die("kết nối ko thành công:". $conn->connect_error);
    }
    $sql="DELETE FROM `post_comment` WHERE id=$id";
    $kq= mysqli_query($conn, $sql);
    header("Location:../QL_cmt.php");
}
if(isset($_GET['pid'])&&isset($_GET['p_img'])){
    $folder_img_rt = '../../';
    $img=$_GET['p_img'];
    $file=  $folder_img_rt.$_GET['p_img'];
    $id=$_GET['pid'];
    $conn = mysqli_connect("localhost","root","","dacs");
    if($conn->connect_error){
        die("kết nối ko thành công:". $conn->connect_error);
    }
    $and_pcmt=mysqli_query($conn, "DELETE FROM `post_comment` WHERE `post_id` = '$id'");
    $sql="DELETE FROM `post` WHERE id=$id";
    $kq= mysqli_query($conn, $sql);
    $check=mysqli_query($conn, "SELECT*FROM post WHERE img='$img'");
    $dem = mysqli_num_rows($check);
    if($dem==0){
        unlink($file);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

?>
