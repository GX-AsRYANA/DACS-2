<?php
    $conn = mysqli_connect('localhost','root','','dacs');   
        if($conn->connect_error){
            die("kết nối ko thành công:". $conn->connect_error);
        }
?>
<table class="table table-hover table-bordered table-responsive">
   <?php
        $txt = $_POST['data'];
        $food = mysqli_query($conn, "SELECT * FROM `food` WHERE `ten` LIKE '%$txt%' ORDER BY `id` DESC");
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