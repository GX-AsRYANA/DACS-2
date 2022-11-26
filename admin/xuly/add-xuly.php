<?php
// session_start();
// // if($_SESSION['role']!='admin')
// //     header('Location:dangnhap.php');
    if($_SERVER["REQUEST_METHOD"]=="POST"){     
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
                    //kiem tra csdl
                    $alert = '';
                        $select = "SELECT * FROM food WHERE ten = '$ten' && img = '$file_path'";
                        $result = mysqli_query($conn, $select);
                        if(mysqli_num_rows($result)>0){
                            $alert= 'Food exist';
                    }else{
                        $sql="INSERT INTO `food` (`ten`, `img`) VALUES ('$ten', '$file_path');";
                        $kq= mysqli_query($conn, $sql);
                        $alert = 'UDLOADED';
                    }
                }
                else{
                    $alert = '';
                    echo 'khong upload duoc';
                }
        }
        else
        $alert = 'vui lòng điền đầy đủ thông tin';
    }
    // session_unset();
    // session_destroy();
    // $_SESSION['alert']=$alert;

    header('location:../admin.php');
    // var_dump($_FILES);
    // move_uploaded_file($_FILES['ul-file']['tmp_name'],'../img/'.$_FILES['ul-file']['name']);
?>