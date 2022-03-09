<?php
    session_start();
    include 'dbh.php';
?>
<?php
    if (isset($_SESSION['username'])){
        if  (!($_SESSION['username'] == 'admin')) {
            header("Location: http://localhost/doantn/index.php");
        }
    } else {
        header("Location: http://localhost/doantn/dangnhap.php");
    }
?>
<?php
    if(isset($_GET['idgh'])){
        $idgh = $_GET['idgh'];
        $sql = "UPDATE giohang SET trangthai='Đang giao hàng' WHERE idgh=$idgh";
        $result = mysqli_query($connect,$sql);
        header("Location: http://localhost/doantn/quanlydonhang.php");
    } else {
        header("Location: http://localhost/doantn/quanlydonhang.php");
    }
?>
