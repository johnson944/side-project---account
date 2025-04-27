<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.html");
    exit();
}

include('db.php');

$id = $_GET['id'];

$username = $_SESSION['username'];
$sql = "DELETE FROM records WHERE id='$id' AND username='$username'";

if (mysqli_query($conn, $sql)) {
    header("Location: /php/home.php"); 
    exit();
} else {
    echo "刪除失敗：" . mysqli_error($conn);
}
?>
