<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.html");
    exit();
}

include('db.php');

$username = $_SESSION['username'];
$date = $_POST['date'];
$note = $_POST['note'];
$amount = $_POST['amount'];

$sql = "INSERT INTO records (username, `date`, note, amount) VALUES ('$username', '$date', '$note', '$amount')";

if (mysqli_query($conn, $sql)) {
    header("Location: /php/home.php"); 
    exit();
} else {
    echo "新增失敗：" . mysqli_error($conn);
}
?>
