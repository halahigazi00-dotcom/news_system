<?php
session_start();
if (!isset($_SESSION['auth_user'])) { header("Location: login_ui.php"); exit(); }
include 'connection.php';


$news_id = $_GET['id'];
$sql = "SELECT * FROM news WHERE id = $news_id";
$result = $connection->query($sql);
$news_data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تعديل الخبر</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2>تعديل الخبر</h2>
        <form action="update_news_logic.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="news_id" value="<?php echo $news_data['id']; ?>">
            
            <label for="title">عنوان الخبر:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($news_data['title']); ?>" required>
            
            <label for="details">تفاصيل الخبر:</label>
            <textarea id="details" name="details" rows="6" required><?php echo htmlspecialchars($news_data['details']); ?></textarea>
            
            <label for="category_id">الفئة:</label>
            <select id="category_id" name="category_id" required>
                <?php
                $cat_sql = "SELECT * FROM categories";
                $cat_result = $connection->query($cat_sql);
                while($cat_row = $cat_result->fetch_assoc()){
                    $selected = ($cat_row['id'] == $news_data['category_id']) ? 'selected' : '';
                    echo "<option value='".$cat_row['id']."' $selected>".htmlspecialchars($cat_row['name'])."</option>";
                }
                ?>
            </select>
            
            <label>الصورة الحالية:</label>
            <img src="uploads/<?php echo $news_data['image']; ?>" width="100"><br><br>
            <label for="image">تغيير الصورة (اختياري):</label>
            <input type="file" id="image" name="image" accept="image/*">
            
            <input type="submit" name="update_news" value="تحديث الخبر">
        </form>
        <p style="text-align:center; margin-top:15px;"><a href="dashboard.php">العودة إلى لوحة التحكم</a></p>
    </div>
</body>
</html>