<div class="sac"></div>
<center><img src="Picture/banner.png" alt="Banner"></center>
<div class="banner"><p><i class="fa-solid fa-location-dot"></i> WELCOME TO FOODMAP ĐÀ NẴNG</p></div>
<div class="new-food">
      <div class="clear-dm"><p>NEW !!</p></div>
      <ul>
         <?php
         $new_food = mysqli_query($conn, "SELECT * FROM `food` ORDER BY id DESC LIMIT 5");
         while($row_f = mysqli_fetch_array($new_food)){
         ?>
         <li>
               <a href="food.php?id=<?=$row_f['id']?>">
               <img src="<?=$row_f['img']?>" alt="">
               <p><?=$row_f['ten']?></p>
            </a>
         </li>
         <?php }?>
      </ul>
      <div class="clear"></div>
</div>
<div class="danhmuc">
      <div class="clear-dm"><p>from</p></div>
      <a href="index.php #food"><div class="htdm">
            <div class="sh"></div>
            <p>ALL</p>
         </div></a>
      <?php
      $continent = mysqli_query($conn, "SELECT * FROM `continent`"); 
      while($row_ctn = mysqli_fetch_array($continent)){
      ?>
         <a href="?id=<?=$row_ctn['id']?> #food"><div class="htdm">
            <div class="sh"></div>
            <p><?=$row_ctn['ten']?></p>
         </div></a>
      <?php }?>
      <div id="food"></div>
</div>
<div class="food">
   <?php if(isset($_GET['id'])){?>
         <div class="list-food">
         <ul>
            <?php
            $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:10;
            $current_page = !empty($_GET['page'])?$_GET['page']:1;
            $offset = ($current_page - 1) * $item_per_page;
            $food = mysqli_query($conn, "SELECT * FROM `food` WHERE `id_ctn`=".$_GET['id']." LIMIT ".$item_per_page." OFFSET ".$offset."");
            $totalRecords = mysqli_query($conn, "SELECT * FROM `food`WHERE `id_ctn`=".$_GET['id'].""); 
            $totalRecords = $totalRecords->num_rows;
            $totalPages = ceil($totalRecords/$item_per_page);
            while($row = mysqli_fetch_array($food)){
            ?>
            <li>
                  <a href="food.php?id=<?=$row['id']?>">
                  <!-- <'?php echo $rowid['id']?> -->
                  <img src="<?=$row['img']?>" alt="">
                  <p><?=$row['ten']?></p>
               </a>
            </li>
            <?php }?>
         </ul>
         </div>
   <?php }else if(isset($_GET['search'])){
         $txt = $_GET['search'];
      ?>
         <div class="list-food">
         <ul>
            <?php
            $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:10;
            $current_page = !empty($_GET['page'])?$_GET['page']:1    ;
            $offset = ($current_page - 1) * $item_per_page;
            $food = mysqli_query($conn, "SELECT * FROM `food` WHERE `ten` LIKE '%$txt%' LIMIT ".$item_per_page." OFFSET ".$offset."");
            $totalRecords = mysqli_query($conn, "SELECT * FROM `food` WHERE `ten` LIKE '%$txt%'"); 
            $totalRecords = $totalRecords->num_rows;
            $totalPages = ceil($totalRecords/$item_per_page);
            while($row = mysqli_fetch_array($food)){
            ?>
            <li>
                  <a href="food.php?id=<?=$row['id']?>">
                  <!-- <'?php echo $rowid['id']?> -->
                  <img src="<?=$row['img']?>" alt="">
                  <p><?=$row['ten']?></p>
               </a>
            </li>
            <?php }?>
         </ul>
         </div>
   <?php }else{?>
   <div class="list-food">
      <ul>
         <?php
         $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:10;
         $current_page = !empty($_GET['page'])?$_GET['page']:1    ;
         $offset = ($current_page - 1) * $item_per_page;
         $food = mysqli_query($conn, "SELECT * FROM `food` LIMIT ".$item_per_page." OFFSET ".$offset."");
         $totalRecords = mysqli_query($conn, "SELECT * FROM `food`"); 
         $totalRecords = $totalRecords->num_rows;
         $totalPages = ceil($totalRecords/$item_per_page);
         while($row = mysqli_fetch_array($food)){
         ?>
         <li>
               <a href="food.php?id=<?=$row['id']?>">
               <img src="<?=$row['img']?>" alt="">
               <p><?=$row['ten']?></p>
            </a>
         </li>
         <?php }?>
      </ul>
   </div>
   <?php }?>
   <div class="clear"></div>
   <div class="page">
      <?php @include('inc/pagination.php'); ?>
   </div>
</div>