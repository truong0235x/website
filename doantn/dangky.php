<?php
    include 'dbh.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="css/dangky.css">
</head>
<body>
    <form method="post">
        <table>
            <thead>
                <tr>
                    <th>Tạo Tài Khoản</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        <input  class="input" type="number" onchange="validateSDT()" name="sdt" placeholder="Số điện thoại">
                        <p class="checksdt"></p>
                    </td>
                </tr>
                <tr>
                    <td><input  class="input" type="email" name="email" placeholder="Email"></td>
                </tr>
                <tr>
                    <td><input  class="input" type="text" name="ten" placeholder="Họ và tên"></td>
                </tr>
                <tr>
                    <td>
                        <input  class="input" type="text" oninput="validateUsername()" name="username" placeholder="tên đăng nhập">
                        <p class="checkusername">Tên đăng nhập chỉ được nhập ký tự A-Z, a-z and 0-9, tối đa 65 kí tự</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input  class="input" onchange="CheckMK()" type="password" name="password" placeholder="mật khẩu">
                        <p class="checkmk"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input  class="input" type="password" name="checkpassword" placeholder="nhập lại mật khẩu">
                        <p class="checkmk1"></p>
                    </td>
                </tr>
                <?php
                    if (isset($_POST["dangky"])) {
                        if(isset($_POST["sdt"])) { $sdt = $_POST['sdt']; }
                        if(isset($_POST["email"])) { $email = $_POST['email']; }
                        if(isset($_POST["ten"])) { $ten = $_POST['ten'];}
                        if(isset($_POST["username"])) { 
                            $username = $_POST['username'];
                        }
                        if(isset($_POST["password"])) { $password = $_POST['password'];}
                        if(isset($_POST["checkpassword"])) { $checkpassword = $_POST['checkpassword'];}

                        if (!($checkpassword == $password)){
                            echo "<tr>";
                                echo "<td class=\"thongbaoloi\">password không khớp</td>";
                            echo "</tr>";
                        } else {
                            if ($sdt and $email and $ten and $username and $password) {
                                $sql2 = "INSERT INTO members (sdt,email,name,username,password)
                                VALUES ('$sdt','$email','$ten','$username','$password')";
                                if ($connect->query($sql2) === TRUE) {
                                    echo "<tr>";
                                        echo "<td class=\"thongbaoloi\">Tạo tài Khoản thành công</td>";
                                    echo "</tr>";
                                } else {
                                    echo "<tr>";
                                        echo "<td class=\"thongbaoloi\">Tên đăng nhập đã tồn tại</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                    echo "<td class=\"thongbaoloi\">Bạn phải điền đầy đủ thồn tin để đăng ký tài khoản</td>";
                                echo "</tr>";
                            } 
                        }                        
                    } 
                ?>
                <tr>
                    <td>
                        <?php
                            if (isset($_POST["dangky1"])) {
                                echo "<p id=\"loi\">Thông tin tài khoản không hợp lệ</p>";
                            }
                        ?>
                        <input type="submit" name="dangky" value="Đăng ký" id="btndangky">
                    </td>
                </tr>
                <tr>
                    <td><a href="dangnhap.php">Đăng nhập</a></td>
                </tr>
            </tbody>
        </table>
    </form>
    <script src="dangky.js"></script>
</body>
</html>