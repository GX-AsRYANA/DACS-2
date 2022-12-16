<?php
@include 'inc/config.php';

session_start();
if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = "SELECT * FROM user_db WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result)>0){
        $error[]= 'Đã tồn tại tài khoản';
    }else{
        if($pass != $cpass){
            $error[]= 'Xác nhận mật khẩu sai';
        }else{
            $insert = "INSERT INTO  user_db(`email`, `password`,`role`) VALUES('$email', '$pass', '0')";
            mysqli_query($conn, $insert);
            header('location:login-form.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/giaodien.css">
    <link rel="stylesheet" href="font/fontawesome-free-6.1.1-web/css/all.min.css">
</head>
<body>
<div class="form-container">  
    <form action="" method="post">
    <h3>Đăng ký</h3>
        <?php 
            if(isset($error)){
                foreach($error as $error){
                    echo'<span class="error-msg">'.$error.'</span>';
                }
            }
        ?>
        <div class="form-group">
            <input type="email" name="username" placeholder="Nhập email" class="box"
        require>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Nhập mật khẩu" class="box"
        require>
            <i class="fa-solid fa-eye" id="eye"></i>
        </div>
        <div class="form-group">
            <input type="password" name="cpassword" placeholder="Xác nhận mật khẩu" class="box"
        require>
            <i class="fa-solid fa-eye" id="eye1"></i>
        </div>
        <input type="submit" value="Đăng ký" name="submit" class="form-btn">
        <p>Đã có tài khoản? <a href="login-form.php">Đăng nhập</a></p>
    </form>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="js/main.js"></script>
</html>