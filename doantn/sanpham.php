<?php
    session_start();
    include 'dbh.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mua Hàng</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/sanpham.css">
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
        <div class="sanpham">
            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM product WHERE id=$id";
                    $result = mysqli_query($connect,$sql);
                    if (mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)) {
                            $gia = number_format($row['gia']);
                            echo "<h3 class=\"tensanpham\">".$row["name"]."</h3>";
                            echo "<hr>";
                            echo "<div class=\"thongtinsanpham\">";
                                echo "<div class=\"img\">";
                                    echo "<img src="."anh/".$row["img"].">";
                                echo "</div>";
                                echo "<div class=\"mota\">";
                                    echo "<h3 class="."price".">".$gia."<span>đ</span></h3>";
                                    echo "<hr>";
                                    echo "<a id=\"luugiohang\" href=\"muahang.php?id=$id\"><h3>MUA NGAY</h3><span>(Giao hàng tận nơi, thanh toán khi nhận hàng)</span></a>";
                                    $mota = $row['mieuta'];
                                    if ($mota){
                                    echo "<p>$mota</p>";
                                    }
                                echo "</div>";
                            echo "</div>";
                            echo "<a id=\"muahang__mobile\" href=\"muahang.php?id=$id\"><h3>MUA NGAY</h3></a>";
                            $loai = $row['loai'];
                            $sql1 = "SELECT * FROM product WHERE loai='$loai'  LIMIT 5";
                            $result1 = mysqli_query($connect,$sql1);
                            if (mysqli_num_rows($result1) > 0){
                                echo "<h3 class=\"thamchieu\">Sản Phảm Tương tự</h3>";
                                echo "<div class=\"section__iphone\">";
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    $gia = number_format($row1['gia']);
                                    $href = "sanpham.php?id=$row1[id]";
                                    echo "<div class="."section__iphone__item".">";
                                        echo "<a href="."$href".">";
                                            echo "<div class="."img".">";
                                                echo "<span class="."capacity".">".$row1['dungluong']."</span>";
                                                echo "<img src="."anh/".$row1["img"].">";
                                                echo "<span class="."reliability".">".$row1["domoi"]."</span>";
                                            echo "</div>";
                                            echo "<div class="."name__sp".">";
                                                echo "<h5>".$row1["name"]."</h5>";
                                            echo "</div>";
                                            echo "<p>";
                                                echo "<i class=\"far  fa-star\">"."</i>";
                                                echo "<i class=\"far  fa-star\">"."</i>";
                                                echo "<i class=\"far  fa-star\">"."</i>";
                                                echo "<i class=\"far  fa-star\">"."</i>";
                                                echo "<i class=\"far  fa-star\">"."</i>";
                                            echo "</p>";
                                            echo "<h3 class="."price".">".$gia."<span>đ</span></h3>";
                                        echo " </a>";
                                    echo "</div>";
                                }
                                echo "</div>";
                            } else {
                                echo 'không thể kết nối';
                            }
                        }
                    } else {
                        echo 'không thể kết nối';
                    }
                } else {
                    echo '<p style=" text-align: center; color: red; font-size: 20px;">bạn chưa chọn sản phẩm nào</p>';
                }
            ?>
        </div>  
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