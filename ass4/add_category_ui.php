<?php
session_start();
if (!isset($_SESSION['auth_user'])) { header("Location: login_ui.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إضافة فئة جديدة</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header"><h1>إضافة فئة جديدة</h1></div>
    <nav><a href="dashboard.php">العودة إلى الرئيسية</a></nav>

    <div class="form-container">
        <?php
        // لعرض رسالة النجاح
        if (isset($_GET['status']) && $_GET['status'] == 'success') {
            echo "<div class='status-message success'>تمت إضافة الفئة بنجاح.</div>";
        }
        ?>
        <form action="add_category_logic.php" method="POST">
            <label for="category_name">اسم الفئة:</label>
          
            <input type="text" id="category_name" name="category_name" placeholder="مثال: أخبار رياضية، أخبار سياسية..." required>
            <input type="submit" name="add_category" value="إضافة الفئة">
        </form>
    </div>
</body>
</html>