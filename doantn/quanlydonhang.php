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
    <link rel="stylesheet" href="css/quanlydonhang.css">
    <title>Quản lý đơn đặt hàng</title>
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
    <p style="margin: 10px 0;"><a href="admin.php" style="text-decoration: none;">< Qua lại trang admin</a></p>
    <table>
        <thead>
            <tr>
                <th>MÃ GD</th>
                <th>TÊN KH</th>
                <th>SĐT KH</th>
                <th>EMAIL KH</th>
                <th>ĐỊA CHỈ NHẬN HÀNG</th>
                <th>TÊN SẢN PHẨM</th>
                <th>Giá</th>
                <th>SỐ LƯỢNG</th>
                <th>TRẠNG THÁI</th>
                <th>THAY ĐỔI TRẠNG THÁI</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $sql = "SELECT giohang.idgh, members.name as namekh, giohang.sdt, giohang.soluongsp,
                members.email, giohang.diachi, product.id, product.name, product.gia, product.soluong, giohang.trangthai, members.username
                FROM ((giohang INNER JOIN product ON giohang.id = product.id) INNER JOIN members ON giohang.username = members.username)";
                $result = mysqli_query($connect,$sql);
                if (mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)) {
                        $soluongsp = $row['soluongsp'];
                        $soluonghang = $row['soluong'];
                        $giasp = $row['gia'];
                        $dongia = $soluongsp * $giasp;
                        $gia = number_format($dongia);
                        $soluong = $soluonghang - $soluongsp;
            ?>
            <tr>
                <td><?php echo $row['idgh']; ?></td>
                <td><?php echo $row['namekh']; ?></td>
                <td><?php echo $row['sdt']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['diachi']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $gia; ?></td>
                <td><?php echo $row['soluongsp']; ?></td>
                <td><?php echo $row['trangthai']; ?></td>
                <td>
                    <a href="suatrangthai.php?idgh=<?php echo $row['idgh']; ?>" style="text-decoration: none; color: #48c368;">Nhận ĐH</a> |
                    <a href="xoadh.php?idgh=<?php echo $row['idgh']; ?>" style="text-decoration: none; color: red;">Huỷ ĐH</a> |
                    <a href="luuthongtingd.php?idgh=<?php echo $row['idgh']; ?>&id=<?php echo $row['id']; ?>&
                    username=<?php echo $row['username']; ?>&name=<?php echo $row['name']; ?>&gia=<?php echo $row['gia']; ?>&
                    soluong=<?php echo $soluong; ?>&soluongsp=<?php echo $soluongsp; ?>"
                    style="text-decoration: none; color: #fad13c;">Hoàn Thành GD</a>
                </td>
            </tr>
            
            <?php    }
                } 
            ?>
        </tbody>
    </table>
</body>
</html>