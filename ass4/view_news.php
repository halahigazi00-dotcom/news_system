<?php
session_start();
if (!isset($_SESSION['auth_user'])) { header("Location: login_ui.php"); exit(); }
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>عرض جميع الأخبار</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header"><h1>جميع الأخبار</h1></div>
    <nav>
        <a href="dashboard.php">الرئيسية</a>
        <a href="add_category_ui.php">إضافة فئة</a>
        <a href="view_categories.php">عرض الفئات</a>
        <a href="add_news_ui.php">إضافة خبر</a>
        <a href="view_news.php">عرض جميع الأخبار</a>
        <a href="view_deleted_news.php">الأخبار المحذوفة</a>
        <a href="logout.php" class="logout-btn">تسجيل الخروج</a>
    </nav>

    <div class="container">
        <?php
        if (isset($_GET['status']) && $_GET['status'] == 'updated') {
            echo "<div class='status-message success'>تم تحديث الخبر بنجاح.</div>";
        }
        if (isset($_GET['status']) && $_GET['status'] == 'deleted') {
            echo "<div class='status-message success'>تم حذف الخبر بنجاح.</div>";
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th>العنوان</th>
                    <th>الفئة</th>
                    <th>التفاصيل</th>
                    <th>الصورة</th>
                    <th>تعديل</th>
                    <th>حذف</th>
                </tr>
            </thead>
            <tbody>
                <?php
              
                $sql = "SELECT news.*, categories.name AS category_name 
                        FROM news 
                        LEFT JOIN categories ON news.category_id = categories.id
                        WHERE news.status = 'active' ORDER BY news.id DESC";
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
                            <?php endif; ?>
                        </td>
                        <td><a class="update-link" href="update_news_ui.php?id=<?php echo $row['id']; ?>">تعديل</a></td>
                        <td><a class="delete-link" href="delete_news_logic.php?id=<?php echo $row['id']; ?>" onclick="return confirm('هل أنت متأكد؟')">حذف</a></td>
                    </tr>
                <?php
                    }
                } else {
                
                    echo "<tr><td colspan='6' style='text-align:center;'>لا توجد أخبار لعرضها.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div style="text-align: center;">
            <a href="add_news_ui.php" class="action-link">إضافة خبر جديد</a>
        </div>
    </div>
</body>
</html>