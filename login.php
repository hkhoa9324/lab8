<?php
    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli("localhost", "username", "password", "database");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Truy vấn kiểm tra đăng nhập
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lấy dữ liệu từ cơ sở dữ liệu
        $row = $result->fetch_assoc();

        // Kiểm tra mật khẩu
        if (password_verify($password, $row['password'])) {
            // Đăng nhập thành công, lưu thông tin người dùng vào session
            session_start();
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }

    // Đóng kết nối
    $conn->close();
?>
