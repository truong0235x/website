<?php
$hostName = 'localhost';
$userName = 'root';
$passWord = '';
$databaseName = 'data';
$connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);
mysqli_set_charset($connect,'UTF8');
if (!$connect) {
    exit('Kết nối không thành công!');
}

?>