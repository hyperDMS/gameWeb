<?php
session_start();
include('header.php');

// Kiểm tra nếu người dùng đã gửi form đăng ký
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Kiểm tra các điều kiện (ví dụ: mật khẩu phải khớp)
    if ($password === $confirm_password) {
        // Giả sử bạn đã xử lý việc lưu thông tin đăng ký vào cơ sở dữ liệu ở đây
        $_SESSION['user_logged_in'] = true;
        $_SESSION['username'] = $username;

        // Chuyển hướng về trang chủ sau khi đăng ký thành công
        header("Location: index.php");
        exit();
    } else {
        echo "Mật khẩu không khớp.";
    }
}
?>
