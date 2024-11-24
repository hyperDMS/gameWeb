<?php
// Khởi tạo session
session_start();

// Xóa tất cả session
session_unset();

// Hủy session
session_destroy();

// Chuyển hướng về trang đăng nhập sau khi đăng xuất
header("Location: index.php");
exit();
?>
