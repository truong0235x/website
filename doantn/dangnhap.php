<?php
    session_start();
    include 'dbh.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <title>Đăng Nhập</title>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="css/dangnhap.css">
</head>
<body>
    <section class="container">
    <a href="index.php" style=" text-decoration: none;">< Quay lại trang HOME</a>
        <div class="login">
        <h1>Đăng Nhập</h1>
        <form method="post">
            <p><input class="input" type="text" name="username" value="" placeholder="Username"></p>
            <p><input class="input" type="password" name="password" value="" placeholder="Password"></p>
            <p class="submit"><input type="submit" name="commit" value="Đăng Nhập" id="bntdangnhap"></p>
            <p><a href="dangky.php">Tạo tài khoản mới</a>
            <?php
                if (isset($_GET['id'])){$id = $_GET['id'];}
                if (isset($_POST["commit"])) {
                    $sql = "SELECT * FROM members";
                    $result = mysqli_query($connect,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $checkusername = $row['username'];
                        $checkpassword = $row['password'];
                        $username = htmlspecialchars($_REQUEST['username']);
                        $password = htmlspecialchars($_REQUEST['password']);
                        if ($username == $checkusername and $password == $checkpassword){
                            if ($username == 'admin'){
                                $_SESSION['username'] = $username;
                                header("Location: http://localhost/doantn/admin.php");
                            } else {
                                if($id) {
                                    $_SESSION['username'] = $username;
                                    header("Location: http://localhost/doantn/muahang.php?id=$id");
                                } else {
                                    $_SESSION['username'] = $username;
                                    header("Location: http://localhost/doantn/index.php");
                                }
                            }
                        } 
                    }
                    echo "<p class=\"loi\">Tài Khoản mật Khẩu Không chính xác</p>";
                }
            ?>
        </form>
        </div>
    </section>
</body>
</html>