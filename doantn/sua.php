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
    <title>Sửa</title>
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
    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM product WHERE id=$id";
            $result = mysqli_query($connect,$sql);
            $row = mysqli_fetch_assoc($result);
        } else {
            return;
        }
    ?>
    <form method="POST">
        <table>
            <tr>
                <th></th>
                <th style="font-size: 16px;  text-align: unset;" >SỬA THÔNG TIN</th>
            </tr>
            <tr>
                <td>LOẠI:</td>
                <td>
                    <select name="loai" id="" value="<?php echo $row['loai']; ?>">
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
                <td><textarea name="ten"><?php echo $row['name']; ?></textarea></td>
            </tr>
            <tr>
                <td>DUNG LƯỢNG:</td>
                <td><input type="text" name="dungluong" value="<?php echo $row['dungluong']; ?>"></td>
            </tr>
            <tr>
                <td>ẢNH:</td>
                <td>
                    <input type="image" value="<?php echo $row['img']; ?>" id="image">
                    <input type="text" value="<?php echo $row['img']; ?>" id="anh" name="anh" style="display: none;">
                    <input type="file" name="img" id="img">
                </td>
            </tr>
            <tr>
                <td>ĐỘ MỚI:</td>
                <td><input type="text" name="domoi" value="<?php echo $row['domoi']; ?>"></td>
            </tr>
            <tr>
                <td>GIÁ:</td>
                <td><input type="text" name="gia" value="<?php echo $row['gia']; ?>"></td>
            </tr>
            <tr>
                <td>MIÊU TẢ:</td>
                <td><textarea name="mieuta"><?php echo $row['mieuta']; ?></textarea></td>
            </tr>
            <tr>
                <td>Số LƯỢNG:</td>
                <td><input type="number" min="1" name="soluong" value="<?php echo $row['soluong']; ?>"></td>
            </tr> 
            <tr>
                <td></td>
                <td><input type="submit" name="sua" value="Sửa Thông Tin"></td>
            </tr>
            <?php
                if (isset($_POST["sua"])) {
                    if(isset($_POST["loai"])) { $loai = $_POST['loai']; }
                    if(isset($_POST["ten"])) { $ten = $_POST['ten']; }
                    if(isset($_POST["dungluong"])) { $dungluong = $_POST['dungluong'];}
                    if(isset($_POST["anh"])) { $anh = $_POST['anh'];}
                    if(isset($_POST["domoi"])) { $domoi = $_POST['domoi'];}
                    if(isset($_POST["gia"])) { $gia = $_POST['gia'];}
                    if(isset($_POST["mieuta"])) { $mieuta = $_POST['mieuta'];}
                    if(isset($_POST["soluong"])) { $soluong = $_POST['soluong'];}


                    
                    if ($loai and $ten and $dungluong and $anh and $domoi and $gia) {
                        $sql2 = "UPDATE product
                        SET loai='$loai', name='$ten', dungluong='$dungluong', img='$anh', domoi='$domoi', gia='$gia', mieuta='$mieuta', soluong='$soluong'
                        WHERE id=$id";
                        if ($connect->query($sql2) === TRUE) {
                            $message = "Sửa sản phẩm thành công";
                            echo "<script type='text/javascript'>alert('$message');window.open(`sua.php?id=$id`,'_self','',true);</script>";
                        } 
                        else {
                            echo "<tr>";
                                echo "<td colspan=\"2\"><h4>Sửa sản phẩm thất bại</h4></td>";
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
    </from>
    <script>
        const img = document.querySelector("#img")
        img.addEventListener("change",  function (event) {
            const image = document.querySelector("#image")
            const anh = document.querySelector("#anh")
            if(img.files[0].name){
                img.name = "anh"
                anh.parentNode.removeChild(anh);
                image.parentNode.removeChild(image);
            }
        })
    </script>
</body>
</html>