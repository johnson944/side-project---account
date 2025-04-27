<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.html");
    exit();
}

include('db.php');

$id = $_POST['id'];
$username = $_SESSION['username'];
$date = $_POST['date'];
$note = $_POST['note'];
$amount = $_POST['amount'];

$sql = "UPDATE records 
        SET date='$date',note='$note',amount='$amount'
        WHERE id='$id' AND username='$username'";

if (mysqli_query($conn, $sql)) {
    header("Location: /php/home.php"); 
    exit();
} else {
    echo "更新失敗：" . mysqli_error($conn);
}
?>