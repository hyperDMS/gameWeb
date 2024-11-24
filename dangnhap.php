<?php
session_start();
include('header.php');

// Kiểm tra nếu người dùng đã gửi form đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập (giả sử bạn đã xử lý việc kiểm tra thông tin đăng nhập ở đây)
    // Nếu đăng nhập thành công:
    $_SESSION['user_logged_in'] = true;
    $_SESSION['username'] = $username;

    // Chuyển hướng về trang chủ
    header("Location: index.php");
    exit();
}
?>
<?php
session_start();

// Kiểm tra nếu người dùng đã gửi form đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập (giả sử bạn đã xử lý việc kiểm tra thông tin đăng nhập ở đây)
    // Nếu đăng nhập thành công:
    $_SESSION['user_logged_in'] = true;
    $_SESSION['username'] = $username;

    // Chuyển hướng về trang chủ
    header("Location: index.php");
    exit();
}

include('header.php');
?>