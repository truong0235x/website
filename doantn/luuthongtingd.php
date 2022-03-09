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
    if(isset($_GET['name'])){$name = $_GET['name'];}
    if(isset($_GET['username'])){$username = $_GET['username'];}
    if(isset($_GET['gia'])){$gia = $_GET['gia'];}
    if(isset($_GET['soluongsp'])){$soluongsp = $_GET['soluongsp'];}
    
    if($name and $username and $gia){
        $sql = "INSERT INTO luuthongtindh(username,name,soluongsp,gia,datetime)
        VALUES ('$username','$name','$soluongsp','$gia',now())";
        if ($connect->query($sql) === TRUE) {
            header("Location: http://localhost/doantn/quanlydonhang.php");
        } else {
            header("Location: http://localhost/doantn/quanlydonhang.php");
        }
    }
?>
<?php
    if(isset($_GET['idgh'])){
        $idgh = $_GET['idgh'];
        $sql = "DELETE FROM giohang WHERE idgh = $idgh" ;
        $result = mysqli_query($connect,$sql);
    } 
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $soluong = $_GET['soluong'];
        $sql ="UPDATE product SET soluong='$soluong' WHERE id=$id";
        $result = mysqli_query($connect,$sql);
    }
?>
