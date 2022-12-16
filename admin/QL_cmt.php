<html>
    <head>
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="../font/fontawesome-free-6.1.1-web/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" 
    integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body style="width: 95%;
               margin: 0 2.5%;
               background:url('../Picture/admin.webp') no-repeat center top;
               background-size: 40%;
               ">
<?php
if(!isset($_SESSION)) {
   session_start();
}
@include('../inc/config.php');
if($_SESSION['role']!='admin'){
   header('location:../login-form.php');
}
if(isset($_SESSION['name'])){
echo $_SESSION['name'];
?>
<a href="../logout.php" class="btn btn-primary" style="text-aligh:end;"><i class="fa-sharp fa-solid fa-right-from-bracket"></i></a>
<?php }?>
<a href="../index.php" class="btn btn-default"><i class="fa-solid fa-house"></i></a>
<a href="admin.php" class="btn btn-default">Quản lý món ăn</a>
<a href="Ql_cmt.php" class="btn btn-primary">Quản lý Comment</a>
<h1 style="text-align:center; color:#fff;">WELCOME to ADMINPAGE</span></h1>
<div class="main_ql_cmt">
    <h3>USER_COMMENT:</h3>

   <ul>
         <?php
         $user_cmt = mysqli_query($conn, "SELECT * FROM `comment` ORDER BY `id` DESC");
         while($row = mysqli_fetch_array($user_cmt)){
         ?>
         <li>
               <p><i class="fa-regular fa-comment"></i>  <strong><?=$row['ten']?></strong> đã bình luận về <strong><?php 
                  $id = $row['id_food'];
                  $food = mysqli_query($conn, "SELECT * FROM `food` WHERE `id`= '$id'");
                  $row_f = mysqli_fetch_array($food);
                  echo $row_f['ten'];
               ?></strong> với nội dung <strong><?=$row['noidung']?></strong><a href="../food.php?id=<?=$row_f['id']?>" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></a><a href="xuly/xoa.php?id_cmt=<?=$row['id']?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></p>
         </li>
         <?php }?>
      </ul>
</div>