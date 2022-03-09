<?php
    session_start();
    include 'dbh.php';
?>

<?php
    if(isset($_POST['idgh'])){
        $idgh = $_POST['idgh'];
        $sql = "DELETE FROM giohang WHERE idgh = $idgh" ;
        $result = mysqli_query($connect,$sql);
        header("Location: http://localhost/doantn/giohang.php");
    } else {
        header("Location: http://localhost/doantn/giohang.php");
    }
?>