<html>
    <head>
        <link rel="stylesheet" href="../css/admin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body style="width: 95%;
               margin: 0 2.5%;">
<?php
session_start();
@include('../inc/config.php');
if(isset($_SESSION['name'])){
echo $_SESSION['name'];
?>
<a href="../logout.php">Thoát</a>
<?php }?>
<a href="../giaodien.php">Web</a>
<div class="main">
   <div class="left">
   <?php
   @include('add-food.php');
   @include('add-foodshop.php');
   ?>
   </div>
   <div class="right">
   <table>
         <tr>
               <td><h2>Ảnh</h2></td>
               <td><h2>Tên món ăn</h2></td>
               <td></td>
               <div class="clear"></div>
            </tr>
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
               <td>
                  <a href="xuly/xoa.php?id=<?=$row['id']?>&&file=../../<?=$row['img']?>" class="btn btn-primary" style="margin-left: 25%">XÓA</a>
                  <a href="xuly/sua.php?id=<?=$row['id']?>&&file=../../<?=$row['img']?>" class="btn btn-danger">SỬA</a>   
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