<!-- header.php -->
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-image: url('background.jpg');
  background-size: cover; /* Tự động điều chỉnh kích thước hình nền để phủ toàn bộ trang */
  background-position: center; /* Căn giữa hình nền */
  background-repeat: no-repeat; /* Ngừng lặp lại hình nền */
}
.header {
  display: flex;
  justify-content: flex-start;  /* Đảm bảo các phần tử nằm từ trái qua phải */
  align-items: center;
  padding: 10px 20px;
  background-color: #333;
  color: white;
}

.header-left {
  display: flex;
  align-items: center;
  margin-right: 20px;  /* Khoảng cách giữa icon và chữ */
}

.header-center {
  font-size: 18px;
  font-weight: bold;
  margin-left: 10px; /* Khoảng cách giữa DMS và header-left */
}

.header-right {
  margin-left: auto;  /* Đẩy header-right sang lề phải */
  display: flex;
  align-items: center;
}

.shop-icon {
  width: 55px;
  height: 55px;
  object-fit: contain;
}


.user-icon {
  width: 50px;
  height: 50px;
  object-fit: cover;
  border-radius: 50%;
}

.user-icon {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
    cursor: pointer;
  }

  .user-menu {
    display: none;
    position: absolute;
    top: 60px;
    right: 0;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .user-menu ul {
    list-style: none;
    padding: 10px 0;
    margin: 0;
  }

  .user-menu ul li {
    padding: 8px 20px;
  }

  .user-menu ul li a {
    text-decoration: none;
    color: #333;
  }

  .user-menu ul li a:hover {
    color: #f39c12;
  }
/* */
.search-container {
  display: flex;
  align-items: center;
  margin-left: 10px; /* Khoảng cách giữa icon người dùng và ô tìm kiếm */
}

.search-input {
  padding: 5px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 5px;
  height: 25px;
  width: 200px; /* Điều chỉnh chiều rộng của ô tìm kiếm */
  outline: none; /* Tắt viền khi click vào ô tìm kiếm */
}


.search-btn {
  width: 30px;
  height: 30px;
  border: none;
  background: url('your-image.jpg') no-repeat center;
  background-size: contain;
  filter: grayscale(100%) brightness(0) invert(1); /* Làm ảnh trắng */
  cursor: pointer;
}
/* Bảng đăng ký, đăng nhập */
.form-popup {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  z-index: 1000;
  width: 300px;
}

.form-popup input {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.form-popup button {
  width: 100%;
  padding: 10px;
  background-color: #333;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.form-popup button:hover {
  background-color: #f39c12;
}

.form-popup .exit-icon {
  position: absolute;
  top: 10px;
  right: 10px;
  width: 20px;
  cursor: pointer;
}

.overlay {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 999;
}
</style>
<?php
// Bắt đầu session để quản lý người dùng đã đăng nhập
session_start();

// Kiểm tra nếu người dùng đã nhấn nút logout
if (isset($_GET['logout'])) {
    // Xóa tất cả các session đã lưu trữ
    session_unset();
    session_destroy();

    // Chuyển hướng về trang đăng nhập hoặc trang chủ
    header("Location: index.php");
    exit();
}
?>
<header class="header">
    <!-- Icon shop bên trái -->
    <div class="header-left">
      <img src="icon_shop_rm.png" alt="Shop Icon" class="shop-icon">
      <div class="search-container">
        <input type="text" placeholder="Tìm kiếm..." class="search-input">
        <img src="icon_search_rm.png" alt="search icon" class="search-btn">
      </div>
    </div>

    <!-- Tên shop ở giữa -->
    <div class="header-center">
      <h1>DMS</h1>
    </div>

    <!-- Icon người dùng bên phải -->
    <div class="header-right">
  <img src="user_login.jpg" alt="User Icon" class="user-icon" id="user-icon">
  <!-- Menu nhỏ -->
  <div class="user-menu" id="user-menu">
  <ul>
          <?php if (!isset($_SESSION['user_logged_in'])): ?>
            <li><a href="#" id="register-link">Đăng ký</a></li>
            <li><a href="#" id="login-link">Đăng nhập</a></li>
          <?php else: ?>
            <li><a href="#" id="register-link">Đăng ký</a></li>
            <li><a href="?logout=true">Đăng xuất</a></li>
          <?php endif; ?>
        </ul>
  </div>
</div>
</header>

<script>
  // Lấy các phần tử cần thiết
  const userIcon = document.getElementById("user-icon");
  const userMenu = document.getElementById("user-menu");

  // Thêm sự kiện click vào icon người dùng
  userIcon.addEventListener("click", function(event) {
    // Ngừng sự kiện click của icon người dùng để tránh nó lan ra ngoài
    event.stopPropagation();

    // Kiểm tra xem menu có đang hiển thị không
    if (userMenu.style.display === "block") {
      userMenu.style.display = "none"; // Ẩn menu nếu đang hiển thị
    } else {
      userMenu.style.display = "block"; // Hiển thị menu
    }
  });

  // Thêm sự kiện click để ẩn menu khi click ra ngoài
  window.addEventListener("click", function(event) {
    // Kiểm tra nếu click ra ngoài icon người dùng và menu
    if (!userIcon.contains(event.target) && !userMenu.contains(event.target)) {
      userMenu.style.display = "none"; // Ẩn menu nếu click ra ngoài
    }
  });
</script>
<!-- Form đăng ký -->
<div class="overlay" id="overlay"></div>
<div class="form-popup" id="register-form">
  <img src="exit.png" alt="Close" class="exit-icon" id="close-register">
  <h2>Đăng ký</h2>
  <form method="POST" action="dangky.php">
    <input type="text" name="username" placeholder="Tên người dùng" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
    <button type="submit">Đăng ký</button>
  </form>
</div>

<!-- Form đăng nhập -->
<div class="form-popup" id="login-form">
  <img src="exit.png" alt="Close" class="exit-icon" id="close-login">
  <h2>Đăng nhập</h2>
  <form method="POST" action="dangnhap.php">
    <input type="text" name="username" placeholder="Tên người dùng" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <button type="submit">Đăng nhập</button>
  </form>
</div>

<script>
// JavaScript để điều khiển việc mở và đóng form đăng ký và đăng nhập
document.getElementById('register-link').addEventListener('click', function() {
  document.getElementById('register-form').style.display = 'block';
  document.getElementById('overlay').style.display = 'block';
});

document.getElementById('login-link').addEventListener('click', function() {
  document.getElementById('login-form').style.display = 'block';
  document.getElementById('overlay').style.display = 'block';
});

document.getElementById('close-register').addEventListener('click', function() {
  document.getElementById('register-form').style.display = 'none';
  document.getElementById('overlay').style.display = 'none';
});

document.getElementById('close-login').addEventListener('click', function() {
  document.getElementById('login-form').style.display = 'none';
  document.getElementById('overlay').style.display = 'none';
});

document.getElementById('overlay').addEventListener('click', function() {
  document.getElementById('register-form').style.display = 'none';
  document.getElementById('login-form').style.display = 'none';
  document.getElementById('overlay').style.display = 'none';
});
</script>
