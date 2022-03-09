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
    <title>Mua Hàng</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/muahang.css">
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
                <li class="header__menu__item">
                    <?php
                        if(isset($_SESSION['username'])) {
                            echo "<a href=\"thongtinkh.php\"><i class=\"fas fa-user\"></i> QL TÀI KHOẢN</a>";
                        } else {
                            echo "<a href=\"dangnhap.php\"><i class=\"fas fa-user\"></i> ĐĂNG NHẬP</a>";
                        }
                    ?>
                </li>
                <li class="header__menu__item"><a href="giohang.php"><i class="fas fa-shopping-cart"></i> GIỎ HÀNG</a></li>
                <li class="header__menu__item">
                    <div class="search">
                        <input type="text" placeholder="search...">
                        <a href="timkiem.php"><i class="fas fa-search"></i></a>
                    </div>
                </li>
            </ul>
        </div>
    </header>

    <script>
        const closeMenu = document.getElementsByClassName("close")[0]
        closeMenu.addEventListener('click',function () {
            const headerMenu = document.getElementsByClassName("header__menu")[0]
            headerMenu.style.display = "none"
        })
    </script>

    <section>
        <?php
            if(isset($_SESSION['username'])){
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM product WHERE id=$id";
                    $result = mysqli_query($connect,$sql);
                    if (mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)) {
                            $gia = number_format($row['gia']);
                            $gia1 = $row['gia'];
                            echo "<div class=\"mathang\">";
                                echo "<div class=\"img\">";
                                    echo "<img src="."anh/".$row["img"].">";
                                echo "</div>";
                                echo "<div class=\"thongtinmathang\">";
                                    echo "<h4>".$row['name']."</h4>";
                                    echo "<p class=\"dungluong\">".$row["dungluong"]."</p>";
                                    echo "<p class=\"gia\">".$gia."</p>";
                                    echo "<span>".$row['mieuta']."<span>";
                                echo "</div>";
                            echo "</div>";
                            $user = $_SESSION['username'];
                            echo "<form method=\"post\" action=\"muahang.php?id=$id\">";
                                $sql1 = "SELECT * FROM members WHERE username='$user'";
                                $result1 = mysqli_query($connect,$sql1);
                                if (mysqli_num_rows($result1) > 0){
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        $name = $row1['name'];
                                        $sdt = $row1['sdt'];
                                        echo "<div class=\"thongtindiachi\">";
                                            echo "<h4>Thông Tin Khách hàng </h4>";
                                            echo "<input type=\"text\" name=\"ten\" class=\"diachi\" value=\"$name\"><br>";
                                            echo "<input type=\"text\" name=\"sdt\" class=\"diachi\" value=".$row1['sdt']."><br>";
                                            echo "<h4>Nhập địa chỉ nhận hàng </h4>";
                                            echo "<input type=\"text\" name=\"diachi\" class=\"diachi\" placeholder=\"nhập địa chỉ nhận hàng\"><br>";
                                            echo "<label for=\"soluong\">Số Lượng:<input class=\"soluong\" type=\"number\" name=\"soluong\" max=".$row['soluong']." min=\"1\" value=\"1\"></label><br>";
                                            echo "<input type=\"submit\" name=\"submit\" class=\"submit\" value=\"Mua Hàng\">";
                                        echo "</div>";
                                    }
                                }
                            echo "</form>";
                        }
                    } else {
                        echo 'không thể kết nối';
                    }
                }
            } else {
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    header("Location: http://localhost/doantn/dangnhap.php?id=$id");
                    exit;
                }
            }
        ?>
        <?php
            if (isset($_POST["submit"])) {
                if(isset($_POST["ten"])) { $ten = $_POST['ten']; }
                if(isset($_POST["sdt"])) { $sdt1 = $_POST['sdt']; }
                if(isset($_POST["diachi"])) { $diachi = $_POST['diachi'];}
                if(isset($_POST["soluong"])) { $soluong = $_POST['soluong'];}
                if ($ten and $sdt and $diachi and $soluong) {
                    $trangthai = "Chờ duyệt";
                    $sql2 = "INSERT INTO giohang (username,name,sdt,id,diachi,trangthai,soluongsp)
                    VALUES ('$user','$ten','$sdt1','$id','$diachi','$trangthai','$soluong')";
                    if ($connect->query($sql2) === TRUE) {
                       ?>
                        <script>
                            location.href = 'http://localhost/doantn/giohang.php';
                        </script>
                       <?php
                    } else {
                        echo "Error: " . $sql2 . "<br>" . $connect->error;
                    }
                } else {
                    echo "<p class=\"dienthongtin\">Bạn phải điền đủ thông tin trước khi mua hàng<p>";
                }
            }
        ?>
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
    <!-- <script src="muahang.js"></script> -->
</body>
</html>