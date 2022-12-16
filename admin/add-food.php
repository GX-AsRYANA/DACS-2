<h1>Thêm Món Ăn</h1>
<form action="xuly/add-xuly.php" method="post" enctype="multipart/form-data">
    <table>
    <tr>
        <td>Tên sp:</td>
        <td><input type="text" name="ten"></td>
    </tr>
    <tr>
        <td>Ảnh:</td>
        <td><input type="file" name="ul-file"></td>
    </tr>
    <tr>
        <td>From:</td>
        <td><select name="id-ctn">
                <?php
                    $conn = mysqli_connect("localhost","root","","dacs");
                    if($conn->connect_error){
                        die("kết nối ko thành công:". $conn->connect_error);
                    }
                    $sql="SELECT * FROM `continent`";
                    $kq= mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_array($kq)){
                        echo'<option value="'.$row['id'].'">'.$row['ten'].'</option>';
                    }
                ?>
            </select></td>
    </tr>
    <tr><td><input type="submit" name="submit" value="ADD"></td></tr>
    </table>
    <p><?php if(isset($_SESSION['alert'])){ echo $_SESSION['alert'];}?></p>
</form>
