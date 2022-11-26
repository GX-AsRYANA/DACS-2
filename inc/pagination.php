<?php for($num = 1;$num <= $totalPages; $num++) {?>
            <a href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a>
<?php }?>