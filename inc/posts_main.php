<div class="sac"></div>
<div class="posts">
      <div class="clear-dm"><p>Bài viết</p></div>
      <ul>
         <?php
         $posts = mysqli_query($conn, "SELECT * FROM `post` WHERE `is_public`=1 ORDER BY id DESC");
         while($row = mysqli_fetch_array($posts)){
         ?>
         <li>
            <div class="cap bv<?=$row['id']?>"><img src="Picture/logo2.jpg" alt="avatar">
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
            <p><?=$row['content']?>.</p></div>
            <a href="post_detail.php?id=<?=$row['id']?>"><div class="img"><img src="<?=$row['img']?>"></div></a>
         </li>
          <?php }
          $count = mysqli_num_rows($posts);
          if($count==0){
              echo '<div style="margin: 2% 3.8%;"><h4>Không có bài viết!!</h4></div>';
          }
          else{
              echo '<div style="text-align: center; margin-top: 2%; padding-bottom: 2%;"><h4>Đã hết bài viết!!</h4><a href="posts.php">quay lại</a></div>';
          }
          ?>
      </ul>
      <div class="clear"></div>
</div>
<div class="sac"></div>