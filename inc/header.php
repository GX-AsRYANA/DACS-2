<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="css/giaodien.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>CDA-Food Map Da Nang</title>
</head>
<body>
    <div class="header">
        <ul>
            <li class="li-img"><a href="giaodien.php"><img src="Picture/logo.jpg" alt="" id="logo"></a></li>
            <li class="li-sb">
                <form action="">
                    <input type="text" placeholder="Search.." name="search" class="input">
                    <button type="submit" class="find">FIND</button>
                </form>
            </li>
            <li class="inc">
                    <?php
                        if(!isset($_SESSION)) {
                            session_start();
                        }
                        if(!isset($_SESSION['username']))
                        {   
                            echo '<a href="login-form.php"><i class="fa-solid fa-user"></i>Đăng Nhập</a>';
                        }
                        else
                        {
                                echo '<a href="logout.php"><i class="fa-solid fa-user"></i>Thoát</a>'; 
                            if($_SESSION['name']='admin'){
                                echo '<a href="admin/admin.php"><i class="fa-solid fa-house"></i>Home</a>';
                            }else{
                                echo '<a href="#"><i class="fa-solid fa-house"></i>Home</a>';
                            }
                        }
                    ?>
            </li>
            <li class="clear"></li>
        </ul>   
    </div>

