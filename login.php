<?php
session_start();
include 'config/db.php';

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

if ($role == "user") {
    $sql = "SELECT * FROM users WHERE email='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "User not registered!";
        header("refresh:2;url=register.php");
    } else {
        $user = $result->fetch_assoc();

        if ($password == $user['password']) {
            $_SESSION['user'] = $user['name'];
            header("Location: user/dashboard.php");
        } else {
            echo "Wrong password!";
        }
    }
}

if ($role == "admin") {
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $username;
        header("Location: admin/dashboard.php");
    } else {
        echo "Invalid admin credentials";
    }
}
?>