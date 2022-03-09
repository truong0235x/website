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
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/giohang.css">
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
                <li class="header__menu__item" style="background-color: rgb(255, 153, 0);"><a href="giohang.php"><i class="fas fa-shopping-cart"></i> GIỎ HÀNG</a></li>
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

    <section>
        <?php
            if(isset($_SESSION['username'])){
                $usernames = $_SESSION['username'];
                $sql = "SELECT product.name, product.gia, product.img, giohang.trangthai, giohang.idgh, giohang.soluongsp FROM giohang INNER JOIN product ON giohang.id = product.id WHERE giohang.username = '$usernames'";
                $result = mysqli_query($connect,$sql);
                if (mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)) {
                        $soluongsp = $row['soluongsp'];
                        $giasp = $row['gia'];
                        $dongia = $soluongsp * $giasp;
                        $gia = number_format($dongia);

                        echo "<form method=\"post\" action=\"userhuydh.php\">";
                            echo "<div class=\"mathang\">";
                                echo "<div class=\"img\">";
                                    echo "<img src="."anh/".$row["img"].">";
                                echo "</div>";
                                echo "<div class=\"thongtinmathang\">";
                                    echo "<h4>".$row['name']."</h4>";
                                    echo "<p class=\"soluong\">số lượng: ".$soluongsp."</p>";
                                    echo "<p class=\"gia\">".$gia."</p>";
                                    echo "<p class=\"trangthai\">".$row['trangthai']."</p>";
                                    echo "<div class=\"huy\">";
                                        echo "<p onclick=\"huyDH(event)\">Huỷ Đơn Hàng</p>";
                                    echo "</div>";

                                    echo "<div class=\"thongbao\">";
                                        echo "<h4>Bạn có muốn huỷ đơn hàng không</h4>";
                                        echo "<input type=\"text\" class=\"idgh\" name=\"idgh\" value=".$row['idgh'].">";
                                        echo "<input type=\"submit\" name=\"huydh\" value=\"có\">";
                                        echo "<p onclick=\"huyYeuCau(event)\">Không</p>";
                                    echo "</div>";

                                echo "</div>";
                            echo "</div>";
                        echo "</form>";
                    }
                } else {
                    echo "<p class=\"thongbao\">Hiện Tại Bạn Chưa Mua Sản Phẩm Nào !</p>";
                }
            } else {
                echo "<p class=\"thongbao\">Hiện Tại Bạn Chưa Mua Sản Phẩm Nào !</p>";
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
    <script src="giohang.js"></script>
</body>
</html>