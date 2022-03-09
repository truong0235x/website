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
    if(isset($_GET['idsl'])){
        $idsl = $_GET['idsl'];
        $sql = "DELETE FROM slide WHERE idsl = $idsl" ;
        $result = mysqli_query($connect,$sql);
        header("Location: http://localhost/doantn/quanlyslide.php");
    } else {
        header("Location: http://localhost/doantn/quanlyslide.php");
    }
?>