<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/fontawesome-free-6.1.1-web/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/giaodien.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/main.js"></script>
    <title>CDA-Food Map Da Nang</title>
</head>
<body>
    <div class="header" id="header">
        <ul>
            <li class="li-img"><a href="index.php"><img src="Picture/logo.jpg" alt="" id="logo"></a></li>
            <li class="li-sb">
                <form action="index.php #food">
                    <input type="text" placeholder="Search.." name="search" class="input" id="find">
                    <button type="submit" class="find">FIND</button>
                </form>
            </li>
            <li class="inc">
                    <?php
                        // echo $_SESSION['role'];
                        if(!isset($_SESSION['role']))
                        {   
                            echo '<a href="login-form.php"><i class="fa-solid fa-user"></i>Đăng Nhập</a>';
                        }
                        else{     
                                // echo $_SESSION['role'];
                                if($_SESSION['role']!='admin'){
                                    echo '<a href="logout.php"><i class="fa-solid fa-user"></i>Thoát</a>';
                                }
                                else{       
                                // echo $_SESSION['role'];
                                echo '<a href="logout.php"><i class="fa-solid fa-user"></i>Thoát</a>';
                                echo '<a href="admin/admin.php"><i class="fa-solid fa-house"></i>Home</a>'; 
                            }
                        }
                    ?>
            </li>
            <li class="clear"></li>
        </ul>   
    </div>
<script>
    var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("header").style.top = "0";
        } else {
            document.getElementById("header").style.top = "-100px";
        }
        prevScrollpos = currentScrollPos;
    }
</script>
