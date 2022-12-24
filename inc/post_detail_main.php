<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = $_POST['p_id'];
        $name = $_POST['name'];
        $nd = $_POST['nd'];
        require('config.php');
        $kq = mysqli_query($conn, "INSERT INTO `post_comment`(`ten`, `nd`, `post_id`) VALUES ('$name', '$nd', '$id')");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
?>
<body>
<div class="post_detail">
      <ul>
         <?php
         $posts = mysqli_query($conn, "SELECT * FROM `post` WHERE id=".$_GET['id']."");
         while($row = mysqli_fetch_array($posts)){
         ?>
         <li>
            <div class="left"><div class="icon">
                <div class="return"><a href="posts.php#bv<?=$row['id']?>"><i class="fa-solid fa-xmark"></i></a></div>
                <div class="home"><a href="index.php" ><img src="Picture/logo2.jpg" alt="avatar"></a></div>
                </div>
            <img src="<?=$row['img']?>"></div>
            <div class="right">
            <div class="cap">
                <img src="Picture/logo2.jpg" alt="avatar">
                <?php if($_SESSION['role']!='admin'){
                    echo '<div class="dropdown">';
                    echo '      <span><i class="fa-solid fa-ellipsis-vertical"></i></span>';
                    echo '       <div class="dropdown-content">';
                    echo '     <a href="">Báo cáo</a>';
                    echo '      </div>';
                    echo '      </div>';
                }
                else{
                    echo '<div class="dropdown">';
                    echo '      <span><i class="fa-solid fa-ellipsis-vertical"></i></span>';
                    echo '       <div class="dropdown-content">';
                    echo '     <a href="admin/xuly/xoa.php?pid='.$row['id'].'&p_img='.$row['img'].'"><i class="fa-solid fa-trash"></i></a>';
                    echo '      </div>';
                    echo '      </div>';
                        }?>
                <h4>ADMIN</h4>
                <h5><?=$row['createdate']?></h5>
                </br>
                <p><?=$row['content']?>.</p>
            </div>
            <div class="bl">
                <div>
                <p></p>
                <h4> Bình luận</h4>
                <p></p>
                </div>
                <ul>
                <?php
                        $cmt = mysqli_query($conn, "SELECT * FROM `post_comment` WHERE `post_id`=".$_GET['id']."");
                        while($row_c = mysqli_fetch_array($cmt)){
                    ?>
                    <li>
                        <img src="Picture/user.jpg" alt="">
                        <div class="nd">
                        <h5><?=$row_c['ten']?></h5>
                        <span><?=$row_c['nd']?></span>
                        </div>
                    </li>
                    <?php }?>
                </ul>
                <?php if(isset($_SESSION['name'])){?>
                <div class="input">
                <form action="inc/post_detail_main.php" method="post">
                <input type="hidden" name="p_id" value="<?=$_GET['id']?>">
                <input type="hidden" name="name" value="<?=$_SESSION['name']?>">
                    <img src="Picture/user.jpg" alt="">
                    <input id="text" type="text" placeholder="Viết bình luận ..." name="nd">
                    <i class="emo fa-solid fa-face-smile"></i>
                    <div class="emoji">
                        <span id="emoji1" onclick="emoji(this.id)">&#128147;</span>
                        <span id="emoji2" onclick="emoji(this.id)">&#128513;</span>
                        <span id="emoji3" onclick="emoji(this.id)">&#128514;</span>
                        <span id="emoji4" onclick="emoji(this.id)">&#128515;</span>
                        <span id="emoji5" onclick="emoji(this.id)">&#128516;</span>
                        <span id="emoji6" onclick="emoji(this.id)">&#128517;</span>
                        <span id="emoji7" onclick="emoji(this.id)">&#128518;</span>
                        <span id="emoji8" onclick="emoji(this.id)">&#128519;</span>
                        <span id="emoji9" onclick="emoji(this.id)">&#128520;</span>
                        <span id="emoji10" onclick="emoji(this.id)">&#128521;</span>
                        <span id="emoji11" onclick="emoji(this.id)">&#128522;</span>
                        <span id="emoji12" onclick="emoji(this.id)">&#128523;</span>
                        <span id="emoji13" onclick="emoji(this.id)">&#128524;</span>
                        <span id="emoji14" onclick="emoji(this.id)">&#128525;</span>
                        <span id="emoji15" onclick="emoji(this.id)">&#128526;</span>
                        <span id="emoji16" onclick="emoji(this.id)">&#128527;</span>
                        <span id="emoji17" onclick="emoji(this.id)">&#128528;</span>
                        <span id="emoji18" onclick="emoji(this.id)">&#128529;</span>
                        <span id="emoji19" onclick="emoji(this.id)">&#128530;</span>
                        <span id="emoji20" onclick="emoji(this.id)">&#128531;</span>
                    </div>
                </form>
                </div>
                <?php }?>
            </div>
            </div>
         </li>
          <?php }?>
      </ul>
      <div class="clear"></div>
</div>

</body>
<script>
    click = false;
    $('.emo').click(function(){
    if(click == false){
        document.getElementsByClassName("emoji")[0].style.height = "200px";
        document.getElementsByClassName("emoji")[0].style.padding = "8px 8px";
        click=true;
    }
    else{   
        document.getElementsByClassName("emoji")[0].style.height = "0px";
        document.getElementsByClassName("emoji")[0].style.padding = "0px";
        click=false;
    }
    });
    function emoji(emoji){
            document.getElementById("text").value+= document.getElementById(emoji).innerHTML;
    };
</script>
</html>