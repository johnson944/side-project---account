<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.html");
    exit();
}

include('db.php');

$id = $_POST['id'];

$username = $_SESSION['username'];
$sql = "SELECT * FROM records WHERE id='$id' AND username='$username'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <title>修改記帳紀錄</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="login-container">
    <h2>編輯紀錄</h2>
    <table border="1">
        <tr>
            <th>日期</th>
            <th>事項</th>
            <th>金額</th>
            <th>操作</th>
        </tr>
        <form class="update-form" action="update.php" method="post">
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<input type='hidden' name='id' value='".$row['id']."'>";
                    echo "<td><input type='date' name='date' value='".$row['date']."'></td>";
                    echo "<td><input type='text' name='note' value='".$row['note']."'></td>";
                    echo "<td><input type='number' name='amount' value='".$row['amount']."'></td>";
                    echo "<td><input type='submit' value='更新'></td>";
                    echo "</tr>";
                }
            ?>
        </form>
    </table>
    <div class="register-link">
      <a href="home.php">取消編輯</a>
    </div>
  </div>
</body>
</html>