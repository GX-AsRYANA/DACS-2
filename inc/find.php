<div class="list-food">
<ul>
    <?php
        require('config.php');
        $txt = $_POST['data'];
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:10;
        $current_page = !empty($_GET['page'])?$_GET['page']:1    ;
        $offset = ($current_page - 1) * $item_per_page;
        $food = mysqli_query($conn, "SELECT * FROM `food` WHERE `ten` LIKE '%$txt%' LIMIT ".$item_per_page." OFFSET ".$offset."");
        $totalRecords = mysqli_query($conn, "SELECT * FROM `food`"); 
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords/$item_per_page);
        while($row = mysqli_fetch_array($food)){
    ?>
    <li>
        <a href="food.php?id=<?=$row['id']?>">
        <img src="<?=$row['img']?>" alt="<?=$row['ten']?>">
        <p><?=$row['ten']?></p>
    </a>
    </li>
    <?php }?>
</ul>
</div>