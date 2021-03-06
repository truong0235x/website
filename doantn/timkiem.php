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
    <title>Tim Kiếm</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/style.css">
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
    </script>

    <section>
        <div class="section__iphone">
            <?php
                if( isset($_GET['value'])) {
                    $value = $_GET['value'];
                } else {
                    return;
                }

                $sql = "SELECT * FROM product WHERE loai like '%$value%' or name like '%$value%' ";
                $result = mysqli_query($connect,$sql);
                if (mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)) {
                        $gia = number_format($row['gia']);
                        $href = "sanpham.php?id=$row[id]";
                        echo "<div class="."section__iphone__item".">";
                            echo "<a href="."$href".">";
                                echo "<div class="."img".">";
                                    echo "<span class="."capacity".">".$row['dungluong']."</span>";
                                    echo "<img src="."anh/".$row["img"].">";
                                    echo "<span class="."reliability".">".$row["domoi"]."</span>";
                                echo "</div>";
                                echo "<div class="."name__sp".">";
                                    echo "<h5>".$row["name"]."</h5>";
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
                } else {
                    echo '<center><p>Không tìm thấy kết quả nào</p></center>';
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