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
                <th style="font-size: 16px;  text-align: unset;">THÊM Slide</th>
            </tr>
            <tr>
                <td>ẢNH:</td>
                <td><input type="file" name="anh"></td>
            </tr>
            <tr>
                <td>TIÊU ĐỀ:</td>
                <td><input type="text" name="tieude"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="themsl" value="Thêm Slide"></td>
            </tr>
            <?php
                    if (isset($_POST["themsl"])) {
                        if(isset($_POST["anh"])) { $anh = $_POST['anh'];}
                        if(isset($_POST["tieude"])) { $tieude = $_POST['tieude'];}
   
                        if ($anh and $tieude) {
                            $sql2 = "INSERT INTO slide(anh,tieude)
                            VALUES ('$anh','$tieude')";
                            if ($connect->query($sql2) === TRUE) {
                                echo "<tr>";
                                    echo "<td colspan=\"2\"><h4>Thêm Slide thành công</h4></td>";
                                echo "</tr>";
                            } else {
                                echo "<tr>";
                                    echo "<td colspan=\"2\"><h4>thêm Slide thất bại</h4></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr>";
                                echo "<td colspan=\"2\"><h4>không được bỏ trống trường nào</h4></td>";
                            echo "</tr>";
                        }                    
                    }
                ?>
        </table>
        <p><a href="quanlyslide.php" style="text-decoration: none;">< Qua lại</a></p>
    </form>
</body>
</html>