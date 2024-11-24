<?php
$servername = "localhost";
$username = "root";  // Tên đăng nhập của bạn
$password = "";      // Mật khẩu của bạn
$dbname = "demo"; // Tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>