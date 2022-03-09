<?php
    session_start();
    include 'dbh.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>
<body>
    <?php
        if (isset($_SESSION['username'])){
            if  (!($_SESSION['username'] == 'admin')) {
                header("Location: http://localhost/doantn/index.php");
            }
        } else {
            header("Location: http://localhost/doantn/dangnhap.php");
        }
    ?>
    <form method="POST">
        <table>
            <tr>
                <th></th>
                <th style="font-size: 16px;  text-align: unset;">THÊM SẢN PHẨM</th>
            </tr>
            <tr>
                <td>LOẠI:</td>
                <td>
                    <select name="loai" id="">
                        <option value="iphone">Iphone</option>
                        <option value="mobile">Mobile</option>
                        <option value="tablet">Tablet</option>
                        <option value="tainghe">Tai nghe</option>
                        <option value="daysac">Dây sạc</option>
                        <option value="sacduphong">Sạc dự phòng</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>TÊN SẢN PHẨM:</td>
                <td><textarea name="ten"></textarea></td>
            </tr>
            <tr>
                <td>DUNG LƯỢNG:</td>
                <td><input type="text" name="dungluong"></td>
            </tr>
            <tr>
                <td>ẢNH:</td>
                <td><input type="file" name="anh"></td>
            </tr>
            <tr>
                <td>ĐỘ MỚI:</td>
                <td><input type="text" name="domoi"></td>
            </tr>
            <tr>
                <td>GIÁ:</td>
                <td><input type="number" min="1" name="gia"></td>
            </tr>
            <tr>
                <td>MIÊU TẢ:</td>
                <td><textarea name="mieuta"></textarea></td>
            </tr>
            <tr>
                <td>Số LƯỢNG:</td>
                <td><input type="number" min="1" name="soluong" value="<?php echo $row['soluong']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="them" value="Thêm Sản Phẩm"></td>
            </tr>
            <?php
                    if (isset($_POST["them"])) {
                        if(isset($_POST["loai"])) { $loai = $_POST['loai']; }
                        if(isset($_POST["ten"])) { $ten = $_POST['ten']; }
                        if(isset($_POST["dungluong"])) { $dungluong = $_POST['dungluong'];}
                        if(isset($_POST["anh"])) { $anh = $_POST['anh'];}
                        if(isset($_POST["domoi"])) { $domoi = $_POST['domoi'];}
                        if(isset($_POST["gia"])) { $gia = $_POST['gia'];}
                        if(isset($_POST["mieuta"])) { $mieuta = $_POST['mieuta'];}
                        if(isset($_POST["soluong"])) { $soluong = $_POST['soluong'];}

                       
                        if ($loai and $ten and $dungluong and $anh and $domoi and $gia) {
                            $sql2 = "INSERT INTO product(loai,name,dungluong,img,domoi,gia,mieuta,soluong)
                            VALUES ('$loai','$ten','$dungluong','$anh','$domoi','$gia','$mieuta','$soluong')";
                            if ($connect->query($sql2) === TRUE) {
                                echo "<tr>";
                                    echo "<td colspan=\"2\"><h4>Thêm sản phẩm thành công</h4></td>";
                                echo "</tr>";
                            } else {
                                echo "<tr>";
                                    echo "<td colspan=\"2\"><h4>thêm sản phẩm thất bại</h4></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr>";
                                echo "<td colspan=\"2\"><h4>Trừ cột miêu tả các cột còn lại bắt buộc phải điền đủ thông tin</h4></td>";
                            echo "</tr>";
                        }                    
                    }
                ?>
        </table>
        <p><a href="admin.php" style="text-decoration: none;">< Qua lại</a></p>
    </form>
</body>
</html>