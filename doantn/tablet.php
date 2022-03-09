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
    <title>Tablet</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/style.css">
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
                <li class="header__menu__item"  style="background-color: rgb(255, 153, 0);"><a href="tablet.php"><i class="fas fa-tablet-alt"></i> TABLET</a></li>
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

        const closeMenu = document.getElementsByClassName("close")[0]
        closeMenu.addEventListener('click',function () {
            const headerMenu = document.getElementsByClassName("header__menu")[0]
            headerMenu.style.display = "none"
        })
    </script>

    <section>
        <div class="phanloaidata">
            <h3>Talet</h3>
            
            <label for="sapxep">Sắp xếp: </label>
            <select name="sapxep" id="sapxep" onChange="window.location='tablet.php?sort_by='+this.value">
                <option value="default">Tuỳ Chọn</option>
                <option value="price-ascending" <?php if(isset($_GET['sort_by'])) {if($_GET['sort_by']=="price-ascending"){ echo "selected";}} ?>>giá từ thấp đến cao</option>
                <option value="price-descending" <?php if(isset($_GET['sort_by'])) {if($_GET['sort_by']=="price-descending"){ echo "selected";}} ?>>giá từ cao đến thấp</option>
                <option value="title-ascending" <?php if(isset($_GET['sort_by'])) {if($_GET['sort_by']=="title-ascending"){ echo "selected";}} ?>>Theo bảng chữ cái từ A-Z</option>
                <option value="title-descending" <?php if(isset($_GET['sort_by'])) {if($_GET['sort_by']=="title-descending"){ echo "selected";}} ?>>Theo bảng chữ cái từ Z-A</option>
            </select>
        </div>

        <div class="section__iphone">
            <?php
                $sapxep = '';
                if(isset($_GET['sort_by'])){ 
                    $sort_by = $_GET['sort_by'];
                    if ($sort_by == "default"){
                        $sapxep = '';
                    }
                    if ($sort_by == "price-ascending"){
                        $sapxep = 'ORDER BY gia ASC';
                    }
                    if ($sort_by == "price-descending"){
                        $sapxep = 'ORDER BY gia DESC';
                    }
                    if ($sort_by == "title-ascending"){
                        $sapxep = 'ORDER BY name ASC';
                    }
                    if ($sort_by == "title-descending"){
                        $sapxep = 'ORDER BY name DESC';
                    }
                }
                $result = mysqli_query($connect, "SELECT count(id) as total FROM product WHERE loai='tablet' $sapxep");
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 10;
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page){
                    $current_page = $total_page;
                }
                else if ($current_page < 1){
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;

                $sql = "SELECT * FROM product WHERE loai='tablet' $sapxep LIMIT $start, $limit";
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
                    echo 'không thể kết nối';
                }

                echo "<div class=\"page\">";
                if (mysqli_num_rows($result) > 10) {
                    if ($current_page > 1 && $total_page > 1){
                        echo '<a href="index.php?page='.($current_page-1).'"><i class="fas fa-angle-double-left"></i></a>';
                    }
                    for ($i = 1; $i <= $total_page; $i++){
                        if ($i == $current_page){
                            echo '<span>'.$i.'</span>';
                        }
                        else{
                            echo '<a href="index.php?page='.$i.'">'.$i.'</a>';
                        }
                    }
                    if ($current_page < $total_page && $total_page > 1){
                        echo '<a href="index.php?page='.($current_page+1).'"><i class="fas fa-angle-double-right"></i></a>';
                    }
                }
                echo "</div>"
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