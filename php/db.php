<?php
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "account"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}
?>
