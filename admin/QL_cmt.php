<html>
    <head>
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="../font/fontawesome-free-6.1.1-web/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" 
    integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body style="width: 95%;
               margin: 0 2.5%;
               background:url('../Picture/admin.webp') no-repeat center top;
               background-size: 40%;
               ">
<?php
if(!isset($_SESSION)) {
   session_start();
   header('refresh: post');
}
@include('../inc/config.php');
if($_SESSION['role']!='admin'){
   header('location:../login-form.php');
}
if(isset($_SESSION['name'])){
echo $_SESSION['name'];

if (isset($_POST["btn_submit"])) {
   //lấy thông tin từ các form bằng phương thức POST
   $content = $_POST["content"];
   $is_public = 0;
   if(!empty($content)&&!empty($_FILES['ul-file'])){
      $folder_path = 'img_post/';
      $folder_img_add = '../';
      $file_path = $folder_path.$_FILES['ul-file']['name'];
      if (isset($_POST["is_public"])) {
         $is_public = $_POST["is_public"];
      }
         move_uploaded_file($_FILES['ul-file']['tmp_name'],$folder_img_add.$file_path);
         $sql = "INSERT INTO post(img, content, is_public, createdate, updatedate) VALUES ( '$file_path', '$content', '$is_public', now(), now())";
         // thực thi câu $sql với biến conn lấy từ file connection.php
         mysqli_query($conn,$sql);
         echo "Bài viết đã thêm thành công";
   }
   else
    echo 'vui lòng điền đầy đủ thông tin';
}
?>
<a href="../logout.php" class="btn btn-primary" style="text-aligh:end;"><i class="fa-sharp fa-solid fa-right-from-bracket"></i></a>
<?php }?>
<a href="../index.php" class="btn btn-default"><i class="fa-solid fa-house"></i></a>
<a href="admin.php" class="btn btn-default">Quản lý món ăn</a>
<a href="Ql_cmt.php" class="btn btn-primary">Quản lý Comment</a>
<h1 style="text-align:center; color:#fff;">WELCOME to ADMINPAGE</span></h1>
<div class="main_ql_cmt_right">
    <h3>USER_COMMENT:</h3>

   <ul>
         <?php
         $user_cmt = mysqli_query($conn, "SELECT * FROM `comment` ORDER BY `id` DESC");
         while($row = mysqli_fetch_array($user_cmt)){
         ?>
         <li>
               <p><i class="fa-regular fa-comment"></i>  <strong><?=$row['ten']?></strong> đã bình luận về <strong><?php 
                  $id = $row['id_food'];
                  $food = mysqli_query($conn, "SELECT * FROM `food` WHERE `id`= '$id'");
                  $row_f = mysqli_fetch_array($food);
                  echo $row_f['ten'];
               ?></strong> với nội dung <strong><?=$row['noidung']?></strong> <a href="../food.php?id=<?=$row_f['id']?>" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></a><a href="xuly/xoa.php?id_cmt=<?=$row['id']?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></p>
         </li>
         <?php }?>
         <?php
         $user_pcmt = mysqli_query($conn, "SELECT * FROM `post_comment` ORDER BY `id` DESC");
         while($rowb = mysqli_fetch_array($user_pcmt)){
         ?>
         <li>
               <p><i class="fa-regular fa-comment"></i>  <strong><?=$rowb['ten']?></strong> đã bình luận về <strong><?php 
                  $id = $rowb['post_id'];
                  $post = mysqli_query($conn, "SELECT * FROM `post` WHERE `id`= '$id'");
                  $row_c = mysqli_fetch_array($post);
               ?></strong> với nội dung <strong><?=$rowb['nd']?></strong> <a href="../post_detail.php?id=<?=$row_c['id']?>" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></a><a href="xuly/xoa.php?id_pcmt=<?=$rowb['id']?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></p>
         </li>
         <?php }?>
      </ul>
   <h3>Danh sách bài viết:</h3>
      <table class="table table-hover table-bordered table-responsive">
         <thead>
            <tr>
               <th>Ảnh</th>
               <th>Nội dung</th>
               <th>Public</th>
               <th>Chi tiết</th>
            </tr>
         </thead>
         <tbody>
         <?php
         $posts = mysqli_query($conn, "SELECT * FROM `post` ORDER BY `id` DESC");
         while($row_p = mysqli_fetch_array($posts)){
            $cmt = mysqli_query($conn, "SELECT * FROM `post_comment` WHERE `post_id`=".$row_p['id']."");
         ?>
            <tr>
               <td><img src="../<?=$row_p['img']?>" alt="Ảnh <?=$row_p['id']?>"></td>
               <td><?=$row_p['content']?></td>
               <td><?php if($row_p['is_public']!=1){echo'Không';}
                     else echo'Có';
               ?></td>
               <td><?php $count = mysqli_num_rows($cmt);
                  echo $count;
               ?>
               <i class="fa-regular fa-comment">
               <a href="../post_detail.php?id=<?=$row_p['id']?>" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></a>
               <a href="xuly/xoa.php?pid=<?=$row_p['id']?>&p_img=<?=$row_p['img']?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
               </td>
            </tr>
         <?php }?>
         </tbody>
      </table>
</div>
<div class="main_ql_cmt_left">
   <h3>Bài viết:</h3>

	<form action="QL_cmt.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td colspan="2"><h3>Thêm bài viết mới</h3></td>
			</tr>	
         <tr>
            <td>Ảnh:</td>
            <td><input type="file" name="ul-file"></td>
         </tr>
			<tr>
				<td nowrap="nowrap">Nội dung :</td>
				<td><textarea name="content" id="content" rows="10" cols="50" style="resize:none;"></textarea></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Public bài viết ? :</td>
				<td><input type="checkbox" id="is_public" name="is_public" value="1"> public</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Thêm bài viết"></td>
			</tr>

		</table>
		
	</form>
</div>