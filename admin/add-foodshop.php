<?php
// session_start();
// // if($_SESSION['role']!='admin')
// //     header('Location:dangnhap.php');
    if($_SERVER["REQUEST_METHOD"]=="POST"){     
        $ten=$_POST['ten'];
        if(!empty($ten)){
            $conn = mysqli_connect("localhost","root","","dacs");
            if($conn->connect_error){
                die("kết nối ko thành công:". $conn->connect_error);
            }
            $sql="INSERT INTO `food` (`ten`, `img`) VALUES ('$ten', '$file_path');";
            $kq= mysqli_query($conn, $sql);
        }
        else
        echo'vui lòng điền đầy đủ thông tin';
    }
    // var_dump($_FILES);
    // move_uploaded_file($_FILES['ul-file']['tmp_name'],'../img/'.$_FILES['ul-file']['name']);
    
?>
<h1>Quốc Gia</h1>
<form action="add-foodshop.php" method="post" enctype="multipart/form-data">
    Tên Châu lục:
    <input type="text" name="ten"></br>
    <input type="submit" name="submit" value="ADD">
</form>
