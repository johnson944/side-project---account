<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        header("Location: /php/home.php");
    } else {
        echo "密碼錯誤！<a href='../index.html'>重新登入</a>";
    }
} else {
    echo "無此帳號！<a href='../index.html'>重新登入</a>";
}

$conn->close();
?>
