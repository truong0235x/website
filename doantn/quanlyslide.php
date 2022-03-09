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
    <title>Quản lý Slide</title>
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
                <th>ID</th>
                <th>Ảnh</th>
                <th>TIỀU ĐỀ</th>
                <th><a href="themsl.php" style="text-decoration: none; color: #00ff2b;">THÊM</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM slide";
                $result = mysqli_query($connect,$sql);
                if (mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['idsl']; ?></td>
                <td><?php echo $row['anh']; ?></td>
                <td><?php echo $row['tieude']; ?></td>
                <td>
                    <a href="suasl.php?idsl=<?php echo $row['idsl']; ?>" style="text-decoration: none; color: #fad13c;">sửa</a> |
                    <a href="xoasl.php?idsl=<?php echo $row['idsl']; ?>" style="text-decoration: none; color: red;">xoá</a>
                </td>
            </tr>
            
            <?php    }
                } 
            ?>
        </tbody>
    </table>
</body>
</html>