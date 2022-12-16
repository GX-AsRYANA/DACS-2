<html>
    <head>
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="../font/fontawesome-free-6.1.1-web/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" 
    integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    </head>
    <body style="width: 95%;
               margin: 0 2.5%;
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
<a href="../logout.php" class="btn btn-primary"><i class="fa-sharp fa-solid fa-right-from-bracket"></i></a>
<?php }?>
<a href="../index.php" class="btn btn-default"><i class="fa-solid fa-house"></i></a>
<a href="admin.php" class="btn btn-primary">Quản lý món ăn</a>
<a href="Ql_cmt.php" class="btn btn-default">Quản lý Comment</a>
<h1 style="text-align: center;
    background: #212529;
    color: #fff;">WELCOME to ADMINPAGE</h1>
<div class="main">
   <div class="left">
   <?php
   @include('add-food.php');
   @include('add-foodshop.php');
   ?>
   </div>
   <div class="right">
   <table class="table table-responsive" style="margin-bottom: 2px;">
         <tr class="table-dark">
               <td><h4>Ảnh</h4></td>
               <td><h4>Tên món ăn</h4></td>
               <td><h4>Địa chỉ</h4></td>
               <td><h4>Hành động</h4></td>
               <div class="clear"></div>
            </tr>
         </table>
         <input type="text" class="timkiem">
   </div>
   <div class="right">
   <table class="table de-class table-hover table-bordered table-responsive">
   
         <?php
            $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:10;
            $current_page = !empty($_GET['page'])?$_GET['page']:1    ;
            $offset = ($current_page - 1) * $item_per_page;
            $food = mysqli_query($conn, "SELECT * FROM `food` ORDER BY id DESC LIMIT ".$item_per_page." OFFSET ".$offset."");
            $totalRecords = mysqli_query($conn, "SELECT * FROM `food`"); 
            $totalRecords = $totalRecords->num_rows;
            $totalPages = ceil($totalRecords/$item_per_page);
         while($row = mysqli_fetch_array($food)){
         ?>
            <tr>
               <td><img src="../<?=$row['img']?>" alt=""></td>
               <td><p><?=$row['ten']?></p></td>
               <td><div style="
                        overflow-y: scroll;
                        max-height: 123px;
               ">
                  <p><?php 
                  $adr_sql = "SELECT * FROM `address` WHERE `fid` = ".$row['id']."";
                  $adr = mysqli_query($conn, $adr_sql);
                  while($rowa = mysqli_fetch_array($adr)){
                     echo '<p style="
                                    border-bottom:1px solid #000;
                                    margin: 0;
                     ">'.$rowa['diachi'].'. ';
                     echo '<a href="xuly/xoa.php?iddc='.$rowa['id'].'" style="color: red;"><i class="fa-solid fa-trash"></i></a></p></br>';
                  }
                  ?></p>
                  </div>
               </td>
               <td>
                  <a href="xuly/sua.php?id=<?=$row['id']?>"class="btn btn-primary" style="margin-left: 25%" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a href="xuly/xoa.php?id=<?=$row['id']?>&&file=../../<?=$row['img']?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>         
               </td>
               <div class="clear"></div>
               </tr>
         <?php }?>
         </table>
         <div class="page">
         <?php for($num = 1;$num <= $totalPages; $num++) {?>
            <a href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a>
         <?php }?>
         </div>
   </div>
</div>
   
</body>
</html>