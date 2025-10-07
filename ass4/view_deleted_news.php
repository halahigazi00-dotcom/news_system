<?php
session_start();
if (!isset($_SESSION['auth_user'])) { header("Location: login_ui.php"); exit(); }
include 'connection.php';
$current_user_id = $_SESSION['auth_user']['id']; // ID المستخدم الحالي
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>الأخبار المحذوفة</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header"><h1>أخباري المحذوفة</h1></div>
    <nav><a href="dashboard.php">العودة إلى الرئيسية</a></nav>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>العنوان</th>
                    <th>الفئة</th>
                    <th>التفاصيل</th>
                    <th>الصورة</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                //  أخبار المستخدم الحالي المحذوفة
                $sql = "SELECT news.*, categories.name AS category_name 
                        FROM news 
                        LEFT JOIN categories ON news.category_id = categories.id
                        WHERE news.status = 'deleted' AND news.user_id = $current_user_id 
                        ORDER BY news.id DESC";
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['category_name'] ?? 'غير مصنف'); ?></td>
                        <td><?php echo htmlspecialchars($row['details']); ?></td>
                        <td>
                            <?php if (!empty($row['image'])): ?>
                                <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="صورة الخبر">
                            <?php else: ?>
                                لا توجد صورة
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                   
                    echo "<tr><td colspan='4' style='text-align:center;'>لا توجد أخبار محذوفة خاصة بك.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>