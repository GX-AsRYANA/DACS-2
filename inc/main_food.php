<div class="sac"></div>
<?php
    $id='';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $food=mysqli_query($conn, "SELECT * FROM `food` WHERE `id`='$id'");
        $row=mysqli_fetch_array($food);
    } 
    ?>
<div class="food_detail">
        <div class="left">
                <h1><?=$row['ten']?></h1>
                <img src="<?=$row['img']?>" alt="">
        </div>
        <div class="right">
            <div class="adr">
                <p style="text-align: center;
                        font-size: 30px;
                        background: black;
                        color: #fff;">Địa chỉ <button onclick="map()"><i class="fa-solid fa-map-location-dot"></i></button></p>
                <ul>
                    <?php
                        $adr_arr=mysqli_query($conn, "SELECT * FROM `address` WHERE `fid`='$id'");
                        while($rowb=mysqli_fetch_array($adr_arr)){
                        ?>
                        <li>
                            <i class="<?=$rowb['type']?>"></i>
                            <p ><?=$rowb['diachi']?>  (<?=$rowb['ten']?>)</p>
                        </li>
                    <?php }?>
                </ul>
            </div>
            <div class="ant-food">
            <p style="text-align: center;
                        font-size: 30px;
                        background: black;
                        color: #fff;">Món ăn khác</p>
                <ul>
                    <?php
                            $a_food=mysqli_query($conn, "SELECT * FROM `food` WHERE `id`!='$id'");
                            while($rowc=mysqli_fetch_array($a_food)){
                        ?>
                    <li><a href="?id=<?=$rowc['id']?>">
                        <img src="<?=$rowc['img']?>" alt="<?=$rowc['ten']?>">
                        <h1><?=$rowc['ten']?></h1>
                        </a>
                    </li>
                    <?php }?>
                </ul>
            </div>
            <div class="clear"></div>
        </div> 
        <div class="comment" style="clear: both;
            background: #b9b9b9;" id="cmt">
                
            </div>
</div>
<script>
    $.get("inc/food_comment.php", {id:"<?=$id?>"}, function(data){
        $("#cmt").html(data);
    });
    function map() {
        const myWindow = window.open("https://www.google.com/maps/@15.9824742,108.2496261,15z?hl=vi", "", "width=700,height=700");
        myWindow.focus();
    };
</script>


