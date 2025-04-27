<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.html");
    exit();
}

include('db.php');

$username = $_SESSION['username'];
$sql = "SELECT * FROM records WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>記帳首頁</title>
</head>
<body>
    <h1>歡迎使用記帳系統，<?php echo htmlspecialchars($username); ?>！</h1>
    
    
    <form action="logout.php" method="post">
      <button type="submit">系統登出</button>
    </form>

    <h2>新增記帳紀錄</h2>
      <form method="post" action="add_record.php">
        <?php
            echo "<h3>今天日期:" . date("Y-m-d") . "<br></h3>";
        ?>
        <label>日期：</label>
        <input type="date" name="date" required><br><br>

        <label>事項：</label>
        <input type="text" name="note" required><br><br>

        <label>金額：</label>
        <input type="number" name="amount" required><br><br>

        <button type="submit">新增紀錄</button>
      </form>

    <h2>您的紀錄</h2>
    <table border="1">
        <tr>
            <th>日期</th>
            <th>事項</th>
            <th>金額</th>
            <th>操作</th>
        </tr>

        <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['note']."</td>";
            echo "<td>".$row['amount']."</td>";
            echo "<td>";

            echo "<form action='update_record.php' method='post' style='display:inline;'>";
            echo "<input type='hidden' name='id' value='".$row['id']."'>";
            echo "<button type='submit'>編輯</button>";
            echo "</form>";
            echo "<br>";
            echo "<a href='delete_record.php?id=".$row['id']."' onclick='return confirm(\"確定要刪除嗎？\")'>刪除</a>";
            echo "</td>";
            echo "</tr>";
          }
        ?>

    </table>
</body>
</html>
