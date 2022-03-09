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
    <title>Thông tin tài khoan</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/thongtinkh.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
</head>
<body>
    <div class="search-mobile">
        <div class="search">
            <input type="text" id="inputsearch__mobile" placeholder="search...">
            <a id="timkiem__mobile"><i class="fas fa-search"></i></a>
        </div>

        <script>
            $(document).ready(function(){
                $('#timkiem__mobile').click(function(){
                    value =$("#inputsearch__mobile").val();
                    window.open(`timkiem.php?value=${value}`,'_self','',true);
                });
            });

            function openMenu() {
                const headerMenu = document.getElementsByClassName("header__menu")[0]
                headerMenu.style.display = "flex"
            }
        </script>

        <div class="menu">
            <i class="fas fa-bars" onclick="openMenu()"></i>
            <a href="index.php"><img src="anh/Untitled.png" alt=""></a>
        </div>
    </div>

    <header>
        <div class="header">
            <ul class="header__menu">
                <li class="header__menu__item"><a href="index.php"><img src="anh/Untitled.png" alt=""></a></li>
                <li class="header__menu__item"><a href="index.php"><i class="fas fa-home"></i> Home</a><i class="fas fa-window-close close"></i></li>
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

    <script>
        $(document).ready(function(){
            $('#timkiem').click(function(){
                value =$("#inputsearch").val();
                window.open(`timkiem.php?value=${value}`,'_self','',true);
            });
        });

        const closeMenu = document.getElementsByClassName("close")[0]
        closeMenu.addEventListener('click',function () {
            const headerMenu = document.getElementsByClassName("header__menu")[0]
            headerMenu.style.display = "none"
        })
    </script>
        <?php
            if (isset($_POST["doimatkhau"])) {
                header("Location: http://localhost/doantn/doimatkhau.php");
                exit;
            }
        ?>
        <?php
            if (isset($_POST["dangxuat"])) {
                session_unset();
                header("Location: http://localhost/doantn/index.php");
                exit;
            }
        ?>
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
                        <th colspan="2">Thông Tin Của Bạn</th>
                    </tr>
                    <tr>
                        <td class="ghichu">Số điện thoại</td>
                        <td>:<input type="text" name="sdt" value="<?php echo $row['sdt']; ?>"></td>
                    </tr>
                    <tr>
                        <td class="ghichu">Họ và tên</td>
                        <td>:<input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
                    </tr>
                    <tr>
                        <td class="ghichu">Email</td>
                        <td>:<input type="text" name="email" value="<?php echo $row['email']; ?>"></td>
                    </tr>
                    <?php
                        if (isset($_POST["suatt"])) {
                            if(isset($_POST["sdt"])) { $sdt = $_POST['sdt']; }
                            if(isset($_POST["name"])) { $name = $_POST['name']; }
                            if(isset($_POST["email"])) { $email = $_POST['email'];}
        
                            
                            if ($sdt and $name and $email) {
                                $sql2 = "UPDATE members
                                SET sdt='$sdt', name='$name', email='$email'
                                WHERE username='$usernames'";
                                if ($connect->query($sql2) === TRUE) {
                                    $message = "Sửa thông tin thành công";
                                    echo "<script type='text/javascript'>alert('$message');window.open(`thongtinkh.php`,'_self','',true);</script>";
                                } 
                                else {
                                    echo "<tr>";
                                        echo "<td colspan=\"2\"><h4>Sửa thông tin thất bại</h4></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                    echo "<td colspan=\"2\"><h4>buộc phải điền đủ thông tin</h4></td>";
                                echo "</tr>";
                            }                    
                        }
                    ?>
                    <tr>
                        <td colspan="2" class="suatt"><input type="submit" name="suatt" value="Lưu Thông Tin"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="doimatkhau" value="Đổi mật khẩu"></td>
                        <td class="dangxuat"><input type="submit" name="dangxuat" value="Đăng xuất"></td>
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