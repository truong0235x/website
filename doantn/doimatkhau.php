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
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/thongtinkh.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
</head>
<body>
    <header>
        <div class="header">
            <ul class="header__menu">
                <li class="header__menu__item"><a href="index.php"><img src="anh/Untitled.png" alt=""></a></li>
                <li class="header__menu__item"><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="header__menu__item"><a href="iphone.php"><i class="fab fa-apple"></i> IPHONE</a></li>
                <li class="header__menu__item"><a href="mobile.php"><i class="fas fa-mobile-alt"></i> MOBILE</a></li>
                <li class="header__menu__item"><a href="tablet.php"><i class="fas fa-tablet-alt"></i> TABLET</a></li>
                <li class="header__menu__item"><a href="phukien.php"><i class="fas fa-headphones"></i> PHỤ KIỆN</a></li>
                <li class="header__menu__item" style="background-color: rgb(255, 153, 0);">
                    <a href="thongtinkh.php"><i class="fas fa-user"></i> QL TÀI KHOẢN</a>
                </li>
                <li class="header__menu__item"><a href="giohang.php"><i class="fas fa-shopping-cart"></i> GIỎ HÀNG</a></li>
                <li class="header__menu__item">
                    <div class="search">
                        <input type="text" id="inputsearch" placeholder="search...">
                        <a id="timkiem"><i class="fas fa-search"></i></a>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <a href="thongtinkh.php" style=" text-decoration: none;">< Quay lại trang Quan  Ly Khach Hàng</a>

    <script>
        $(document).ready(function(){
            $('#timkiem').click(function(){
                value =$("#inputsearch").val();
                window.open(`timkiem.php?value=${value}`,'_self','',true);
            });
        });
    </script>

    <section>
        <form method="POST">
            <table>
                <?php
                    if(isset($_SESSION['username'])){
                        $usernames = $_SESSION['username'];
                        $sql = "SELECT * FROM members WHERE username = '$usernames'";
                        $result = mysqli_query($connect,$sql);
                        if (mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th colspan="2">Đổi Mật Khẩu</th>
                    </tr>
                    <tr>
                        <td class="ghichu">Tên đăng nhập</td>
                        <td>:<input type="text" name="username" value=""></td>
                    </tr>
                    <tr>
                        <td class="ghichu">Mật khẩu cũ</td>
                        <td>:<input type="password" name="password" value=""></td>
                    </tr>
                    <tr>
                        <td class="ghichu">Mật Khẩu mới</td>
                        <td>:<input type="password" name="passwordnew" value=""></td>
                    </tr>
                    <tr>
                        <td class="ghichu">Nhập lại mật khẩu mới</td>
                        <td>:<input type="password" name="checkpasswordnew" value=""></td>
                    </tr>
                    <?php
                        if (isset($_POST["doimk"])) {
                            if(isset($_POST["username"])) { $username = $_POST['username']; }
                            if(isset($_POST["password"])) { $passwork = $_POST['password']; }
                            if(isset($_POST["passwordnew"])) { $passwordnew = $_POST['passwordnew'];}
                            if(isset($_POST["checkpasswordnew"])) { $checkpasswordnew = $_POST['checkpasswordnew'];}
        
                            
                            if ($username and $passwork and $passwordnew and $checkpasswordnew) {
                                $user = $row['username'];
                                $pass = $row['password'];
                                if($username == $user and $passwork == $pass) {
                                    if($passwordnew == $checkpasswordnew){
                                        $sql2 = "UPDATE members
                                        SET password='$passwordnew'
                                        WHERE username='$usernames'";
                                        if ($connect->query($sql2) === TRUE) {
                                            $message = "Đổi mật khẩu thành công";
                                            echo "<script type='text/javascript'>alert('$message');window.open(`doimatkhau.php`,'_self','',true);</script>";
                                        } else {
                                            echo "<tr>";
                                                echo "<td colspan=\"2\"><center><h4>Sửa thông tin thất bại</h4></center></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr>";
                                            echo "<td colspan=\"2\"><center><h4>Nhập lại mật khẩu mới không khớp với mật khẩu mới</h4></center></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr>";
                                        echo "<td colspan=\"2\"><center><h4>Tài khoản mật khẩu không chính xác</h4></center></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                    echo "<td colspan=\"2\"><center><h4>Buộc phải điền đủ thông tin</h4></center></td>";
                                echo "</tr>";
                            }                    
                        }
                    ?>
                    <tr>
                        <td colspan="2" class="suatt"><input type="submit" name="doimk" value="Đổi Mật Khẩu"></td>
                    </tr>
                <?php            }
                        } 
                    } else {
                        echo "<p class=\"thongbao\">Bạn chưa đăng nhập tài khoản</p>";
                    }
                ?>
            </table>
        <form>
    </section>
    <footer>
        <div class="footer">
            <ul class="footer__information">
                <li class="footer__information__item"><h3>Thông tin liên hệ</h3></li>
                <li class="footer__information__item"><i class="far fa-envelope"></i> Gmail: truong13111999@gmail.com</li>
                <li class="footer__information__item"><i class="fab fa-facebook-square"></i> Facebook:
                    <a href="https://www.facebook.com/truong0235/" target="_blank">Quang Trường</a></li>
                <li class="footer__information__item"><i class="fas fa-phone-alt"></i> Phone: 0968516842</li>
            </ul>
        </div>
    </footer>
</body>
</html>