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
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin</title>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
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
    <div class="quanlydonhang">
        <div class="quanly"><a href="quanlydonhang.php">Quan lý đơn đặt hàng</a></div>
        <div class="quanly"><a href="quanlyslide.php">Quan lý Slide</a></div>
    </div>
    <form method="POST">
        <div class="dangxuat"><input type="submit" name="dangxuattk" value="Đăng Xuất"></div>
    </form>
    <?php
        if (isset($_POST["dangxuattk"])) {
            session_unset();
            header("Location: http://localhost/doantn/index.php");
        }
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>LOẠI</th>
                <th>TÊN SẢN PHẨM</th>
                <th>DUNG LƯỢNG</th>
                <th>ẢNH</th>
                <th>ĐỘ MỚI</th>
                <th>GIÁ</th>
                <th>MIÊU TẢ</th>
                <th>SỐ LƯỢNG</th>
                <th><a href="them.php" style="text-decoration: none; color: #00ff2b;">THÊM</a></th>
            </tr>
        </thead>
        <tbody>
    <?php
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $result = mysqli_query($connect, "SELECT count(id) as total FROM product");
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

        $sql = "SELECT * FROM product LIMIT $start, $limit";
        $result = mysqli_query($connect,$sql);
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)) {
                $gia = number_format($row['gia']);
    ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['loai']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['dungluong']; ?></td>
                <td><?php echo $row['img']; ?></td>
                <td><?php echo $row['domoi']; ?></td>
                <td><?php echo $gia ?></td>
                <td><?php echo $row['mieuta']; ?></td>
                <td><?php echo $row['soluong']; ?></td>
                <td>
                    <a href="sua.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: #fad13c;">sửa</a> |
                    <a href="xoa.php?id=<?php echo $row['id']; ?>&page=<?php echo $page; ?>" style="text-decoration: none; color: red;">xoá</a>
                </td>
            </tr>

        <?php   }
        } 
        ?>
        </tbody>
    </table>
    <?php
        echo "<div class=\"page\">";
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="admin.php?page='.($current_page-1).'"><i class="fas fa-angle-double-left"></i></a>';
            }
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<span>'.$i.'</span>';
                } else{
                    echo '<a href="admin.php?page='.$i.'">'.$i.'</a>';
                }
            }
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="admin.php?page='.($current_page+1).'"><i class="fas fa-angle-double-right"></i></a>';
            }
        echo "</div>";
    ?>
</body>
</html>