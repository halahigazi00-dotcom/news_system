<?php
session_start();
if (!isset($_SESSION['auth_user'])) { header("Location: login_ui.php"); exit(); }
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>عرض جميع الفئات</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header"><h1>الفئات الموجودة</h1></div>
    <nav><a href="dashboard.php">العودة إلى الرئيسية</a></nav>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>اسم الفئة</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM categories ORDER BY id DESC";
                $result = $connection->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row['id']."</td><td>".htmlspecialchars($row['name'])."</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='2' style='text-align:center;'>لا توجد فئات لعرضها.</td></tr>";
                }
                ?>
            </tbody>
        </table>
      
        <div style="text-align: center;">
            <a href="add_category_ui.php" class="action-link">إضافة فئة جديدة</a>
        </div>
    </div>
</body>
</html>