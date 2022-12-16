<?php for($num = 1;$num <= $totalPages; $num++) {
        if(isset($_GET['id'])){?>
            <a href="?id=<?=$_GET['id']?>&&per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a>
<?php }else if(isset($_GET['search'])){?>
            <a href="?search=<?=$_GET['search']?>&&per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a>
        <?php }else{?>
    <a href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a>
    <?php }}?>