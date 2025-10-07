<?php
session_start();
if (!isset($_SESSION['auth_user'])) { header("Location: login_ui.php"); exit(); }
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إضافة خبر جديد</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header"><h1>إضافة خبر جديد</h1></div>
    <nav><a href="dashboard.php">العودة إلى الرئيسية</a></nav>

    <div class="form-container">
        <?php
        // لعرض رسالة النجاح
        if (isset($_GET['status']) && $_GET['status'] == 'success') {
            echo "<div class='status-message success'>تمت إضافة الخبر بنجاح.</div>";
        }
        ?>
        <form action="add_news_logic.php" method="POST" enctype="multipart/form-data">
            <label for="title">عنوان الخبر:</label>
            <input type="text" id="title" name="title" required>
            
            <label for="details">تفاصيل الخبر:</label>
            <textarea id="details" name="details" rows="6" required></textarea>
            
            <label for="category_id">الفئة:</label>
            <select id="category_id" name="category_id" required>
                <option value="">-- اختر فئة --</option>
                <?php
                $cat_sql = "SELECT * FROM categories";
                $cat_result = $connection->query($cat_sql);
                while($cat_row = $cat_result->fetch_assoc()){
                    echo "<option value='".$cat_row['id']."'>".htmlspecialchars($cat_row['name'])."</option>";
                }
                ?>
            </select>
            
            <label for="image">صورة الخبر (اختياري):</label>
            <input type="file" id="image" name="image" accept="image/*">
            
            <input type="submit" name="add_news" value="إضافة الخبر">
        </form>
    </div>
</body>
</html>