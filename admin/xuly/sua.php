<?php
// session_start();
// // if($_SESSION['role']!='admin')
// //     header('Location:dangnhap.php');
$id='';
//if(isset($_GET['id'])&&isset($_GET['file']))
if (true)
{ 

if (isset($_GET['id'])) $id = $_GET['id'];
$file = $_GET['file'];
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $id=$_POST['hid'];
        echo $id."XXXXXXXXXXX";
        
        $ten=$_POST['ten'];
        if(!empty($ten)&&!empty($_FILES['ul-file'])){
                $folder_path = 'img/';
                $folder_img_add = '../../';
                $file_path = $folder_path.$_FILES['ul-file']['name'];
                $flag_ok = true;
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES['ul-file']["tmp_name"]);
                    if($check !== false) {
                    //   echo "File is an image - " . $check["mime"] . ".";
                    $flag_ok = true;
                    } else {
                    echo "File is not an image.";
                    $flag_ok = false;
                    }
                }
                if(file_exists($file_path)){
                    echo 'file da ton tai';
                    $flag_ok = false;
                }
                $ex = array('jpg','png','jpeg','pneg');
                $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
                if(!in_array($file_type,$ex)){
                    echo 'file khong hop le';
                    $flag_ok = false;
                }
                if($flag_ok){
                    move_uploaded_file($_FILES['ul-file']['tmp_name'],$folder_img_add.$file_path);
                    $conn = mysqli_connect("localhost","root","","dacs");
                    if($conn->connect_error){
                        die("kết nối ko thành công:". $conn->connect_error);
                    }
                    // //kiem tra csdl
                    // $alert = '';
                    //     $select = "SELECT * FROM food WHERE ten = '$ten' && img = '$file_path'";
                    //     $result = mysqli_query($conn, $select);
                    //     if(mysqli_num_rows($result)>0){
                    //         $alert= 'Food exist';
                    // }else{
                        //SUA CSDL
                        $sql="UPDATE `food` SET `ten`='$ten',`img`='$file_path' WHERE `id`='$id');";
                        $kq= mysqli_query($conn, $sql);
                        unlink($file);
                        $alert = 'UPDATED';
                    // }
                }
                else{
                    $alert = '';
                    echo 'khong update duoc';
                }
        }
        else
        $alert = 'vui lòng điền đầy đủ thông tin';
    }
}else{
    $alert = 'ko nhận được id';
}
    // session_unset();
    // session_destroy();
    // $_SESSION['alert']=$alert;

    // header('location:../admin.php');
    // var_dump($_FILES);
    // move_uploaded_file($_FILES['ul-file']['tmp_name'],'../img/'.$_FILES['ul-file']['name']);
?>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body{
            width: 95%;
            margin: 0 2.5%;
        }
        .form{
            border: 5px solid #000;
            border-radius: 15px;
            width: 35%;
            margin: 2% 0;
        }
        .form form{
            margin-left: 3%;
        }
        .display-food table tr td img{
            width: 10%;
        }
        .display-food tr .clear{
            clear: both;
        }
        .display-food table tr td{
            border: 1px solid #000;
            width: 25%;
            text-align: center;
        }
        .display-food table tr td h3{
            text-align: center;
            margin: 0;
        }
        .display-food table tr td img{
            width: 20%;
        }
    </style>
</head>
<body>
<a href="../admin.php" class="btn btn-primary">back</a>
<div class="form">
<h1>Sửa</h1>
<form action="sua.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $id; ?>" name="hid">
    Tên sp:
    <input type="text" name="ten"></br>
    Ảnh:
    <input type="file" name="ul-file">
    <input type="submit" name="submit" value="ADD">
    <p><?php if(isset($alert)){ echo $alert;}?></p>
</form>
</div>
<div class="display-food">
    <?php
        $conn = mysqli_connect("localhost","root","","dacs");
        if($conn->connect_error){
            die("kết nối ko thành công:". $conn->connect_error);
        }
        $food = mysqli_query($conn, "SELECT * FROM `food` WHERE `id` = $id");
        $row = mysqli_fetch_array($food);
    ?>
    <table>
        <tr>
            <td><h3>Ảnh</h3></td>
            <td><h3>Tên món ăn</h3></td>
            <div class="clear"></div>
        </tr>
        <tr>
            <td><img src="<?=$file?>" alt=""></td>
            <td><h1><?=$row['ten']?></h1></td>
        </tr>
    </table>
</div>