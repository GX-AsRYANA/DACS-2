<?php
    require('config.php');
    if (isset($_GET['id'])){
        $id = $_GET['id'];}
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $fid=$_POST['hid'];
            $ten=$_POST['name'];
            $content=$_POST['comment'];
            if(!empty($content)){
                        $select=mysqli_query($conn, "INSERT INTO `comment`(`ten`, `noidung`, `id_food`) VALUES ('$ten','$content','$fid')");
                        header("location:../food.php?id=$fid #cmt");
            }
            else{
            $alert = 'vui lòng điền đầy đủ thông tin';
            }
        }
?>
<div class="row" style="
    margin-right: 0;
    margin-left: 0;
">
    <?php
        if(!isset($_SESSION)) {
            session_start();
        }
        if(isset($_SESSION['name'])){
    ?>
    <div style="float:left;
    width: 30%;">
    
    <h3 >COMMENT</h3>
    <form action="inc/food_comment.php" method="post" id="commentform" novalidate>
    <input type="hidden" value="<?=$id?>" name="hid">
    <input type="hidden" value="<?=$_SESSION['name']?>" name="name">
    <p> </span></p><p class="comment-form-comment"><label for="comment">Bình luận</label> <textarea name="comment" style="resize:none; width: 396px;
    height: 126px;" cols="45" rows="8" maxlength="65525" required="required"></textarea></p>
    <p class="form-submit"><input name="submit" type="submit" value="Đăng" />
    
    </p></form>	
    </div>
    <?php }?>
    <!-- #respond -->
   <div class="display_comments" style="float:right; width: 68%;">
   <h3>PREVIOUS COMMENT</h3>
        <ul class="d-cmt">
            <?php
                $id = '';
                if (isset($_GET['id'])){
                    $id = $_GET['id'];}
                $cmt=mysqli_query($conn, "SELECT * FROM `comment` WHERE `id_food`='$id'");
                while($row=mysqli_fetch_array($cmt)){
                ?>
                    <li style="width: 100%;"> 
                        <div><img src="Picture/user.jpg" alt="" style="    width: 7%;
            float: left;
            margin-left: 14px;"></div>
                        <div class="cmt" style="width: 90%;float:right;">
                        <h4 style="color: blue;"><?=$row['ten']?></h4>
                        <?=$row['noidung']?>
                        </div>
                        <div style="clear:both;"></div>
                    </li>
            <?php }?>
            
        </ul>
   </div>
</div>