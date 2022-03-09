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
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM product WHERE id=$id";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_assoc($result);
    } else {
        return;
    }
?>

<?php
    $sql = "DELETE FROM product WHERE id = $id" ;
    $result = mysqli_query($connect,$sql);
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        header("Location: http://localhost/doantn/admin.php?page=$page");
    } else {
        header("Location: http://localhost/doantn/admin.php");
    }

?>