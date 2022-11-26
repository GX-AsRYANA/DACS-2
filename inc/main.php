<div class="sac"></div>
<div class="danhmuc">
      <div class="clear-dm"><p>from</p></div>
      <a href=""><div class="htdm">
         <div class="sh"></div>
         <p>CHÂU Á</p>
      </div></a>
      <a href=""><div class="htdm">
         <div class="sh"></div>
         <p>CHÂU ÂU</p>
      </div></a>   
   </div>
<div class="food">
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
            <a href="">
               <img src="<?=$row['img']?>" alt="">
               <p><?=$row['ten']?></p>
            </a>
         </li>
         <?php }?>
      </ul>
   </div>
   <div class="clear"></div>
   <div class="page">
      <?php @include('inc/pagination.php'); ?>
   </div>
</div>