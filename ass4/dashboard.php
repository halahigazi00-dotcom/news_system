<?php
session_start();
if (!isset($_SESSION['auth_user'])) {
    header("Location: login_ui.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <h1>نظام إدارة الأخبار</h1>
               <h2>مرحباً بك, <?php echo htmlspecialchars($_SESSION['auth_user']['name']); ?>!</h2>
    </div>
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
        <div class="welcome-message">
            <h3>مرحباً بك في لوحة التحكم</h3>
            <h4>يمكنك إدارة الأخبار والفئات من خلال القائمة أعلاه.</h4>
        </div>
    </div>
</body>
</html>