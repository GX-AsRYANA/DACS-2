<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){     
        $fid=$_POST['id_food'];
        $adr=$_POST['address'];
        $name=$_POST['adr-name'];
        $type=$_POST['type'];
        if(!empty($adr)&&!empty($fid)&&!empty($name)&&!empty($type)){
            $conn = mysqli_connect("localhost","root","","dacs");
            if($conn->connect_error){
                die("kết nối ko thành công:". $conn->connect_error);
            }
            //ktra csdl
            $alert = '';
                $select = "SELECT * FROM `address` WHERE `diachi` = '$adr' && `fid` = '$fid' && `ten` = '$name' && `type` = '$type'";
                $result = mysqli_query($conn, $select);
                if(mysqli_num_rows($result)>0){
                    $alert= 'address exist';
                }else{
                    $sql="INSERT INTO `address`(`ten`, `diachi`, `type`, `fid`) VALUES ('$name','$adr','$type','$fid')";
                    $kq= mysqli_query($conn, $sql);
                    header('location:admin.php');
                    $alert = 'Success';
                }  
        }
        else
        $alert ='vui lòng điền đầy đủ thông tin';
    }
?>
<h1>Địa điểm</h1>
<form action="add-foodshop.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Món ăn: </td>
            <td><select name="id_food">
                <?php
                    $conn = mysqli_connect("localhost","root","","dacs");
                    if($conn->connect_error){
                        die("kết nối ko thành công:". $conn->connect_error);
                    }
                    $sql="SELECT * FROM `food`";
                    $kq= mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_array($kq)){
                        echo'<option value="'.$row['id'].'">'.$row['ten'].'</option>';
                    }
                ?>
        </select></td>
        </tr>
        <tr>
    <td>Địa chỉ:</td>
    <td><input type="text" name="address"></td>
    </tr>
    <tr>
    <td>Tên cửa hàng:</td>
    <td><input type="text" name="adr-name"></td>
</tr>
<tr>
    <td>Địa chỉ:</td>
    <td><select name="type">
                    <option value="fa-solid fa-store">Nhà hàng</option>
                    <option value="fa-solid fa-utensils">Vỉa hè</option>
        </select>
        </td>
        </tr>
        <tr><td>
    <input type="submit" name="submit" value="ADD"></td></tr>
    </table>
    <!-- <p><,?php if(isset($_SESSION['alert'])){ echo $_SESSION['alert'];}?></p> -->
    <?php echo $alert;?>
</form>
