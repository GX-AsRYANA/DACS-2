<h1>Thêm Món Ăn</h1>
<form action="xuly/add-xuly.php" method="post" enctype="multipart/form-data">
    Tên sp:
    <input type="text" name="ten"></br>
    Ảnh:
    <input type="file" name="ul-file">
    <input type="submit" name="submit" value="ADD">
    <p><?php if(isset($_SESSION['alert'])){ echo $_SESSION['alert'];}?></p>
</form>
