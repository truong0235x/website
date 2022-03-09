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
    <title>Sửa Slide</title>
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
        if(isset($_GET['idsl'])){
            $idsl = $_GET['idsl'];
            $sql = "SELECT * FROM slide WHERE idsl=$idsl";
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
                <td>ẢNH:</td>
                <td>
                    <input type="image" value="<?php echo $row['anh']; ?>" id="image">
                    <input type="text" value="<?php echo $row['anh']; ?>" id="anh" name="anh" style="display: none;">
                    <input type="file" name="img" id="img">
                </td>
            </tr>
            <tr>
                <td>TIÊU ĐỀ:</td>
                <td><textarea name="tieude"><?php echo $row['tieude']; ?></textarea></td>
            </tr> 
            <tr>
                <td></td>
                <td><input type="submit" name="suasl" value="Sửa Thông Tin"></td>
            </tr>
            <?php
                if (isset($_POST["suasl"])) {
                    if(isset($_POST["anh"])) { $anh = $_POST['anh'];}
                    if(isset($_POST["tieude"])) { $tieude = $_POST['tieude'];}

                    
                    if ($anh and $tieude) {
                        $sql2 = "UPDATE slide
                        SET anh='$anh', tieude='$tieude'
                        WHERE idsl=$idsl";
                        if ($connect->query($sql2) === TRUE) {
                            $message = "Sửa slide thành công";
                            echo "<script type='text/javascript'>alert('$message');window.open(`suasl.php?idsl=$idsl`,'_self','',true);</script>";
                        } 
                        else {
                            echo "<tr>";
                                echo "<td colspan=\"2\"><h4>Sửa slide thất bại</h4></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                            echo "<td colspan=\"2\"><h4>bắt buộc phải điền đủ thông tin</h4></td>";
                        echo "</tr>";
                    }                    
                }
            ?>
        </table>
        <p><a href="quanlyslide.php" style="text-decoration: none;">< Qua lại</a></p>
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