<?php
@include 'inc/config.php';

if(!isset($_SESSION)) {
    session_start();
}
if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = md5($_POST['password']);
    if($email!=''&&$pass!=''){
        $select = "SELECT * FROM user_db WHERE email = '$email' && password = '$pass'";
        $result = mysqli_query($conn, $select);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_array($result);
            $_SESSION['name'] = $row['email'];
            $_SESSION['role'] = $row['role'];
            if ($row['role']==1){
                $_SESSION['role'] = 'admin';
                header("Location:admin/admin.php");
            }
            else{
                $_SESSION['role'] = 'user';
                header("Location:index.php");
            }
        }else{  
            $error[] = 'Sai tài khoản hoặc mật khẩu';
        }
    }else{  
        $error[] = 'Điền tài khoản và mật khẩu';
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
    <a href="index.php"><li class="fa-solid fa-house home"></li></a>
    <h3>Đăng nhập</h3>
    <?php 
            if(isset($error)){
                foreach($error as $error){
                    echo'<span class="error-msg">'.$error.'</span>';
                }
            }
        ?>
        <div class="form-group">
            <input type="email" name="username" placeholder="Nhập email" class="box" require>
        </div>
        <div class="form-group">
            
            <input type="password" name="password" placeholder="Nhập mật khẩu" class="box" require>
        <i class="fa-solid fa-eye" id="eye"></i>
        </div>
        <input type="submit" value="Đăng nhập" name="submit" class="form-btn">
        <p>Chưa có tài khoản? <a href="register-form.php">Đăng ký</a></p>
    </form>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="js/main.js"></script>
</html>