<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إنشاء حساب جديد</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2>إنشاء حساب جديد</h2>
        <?php
        // لعرض رسالة الخطأ في حال تكرار الإيميل
        if (isset($_GET['error']) && $_GET['error'] == 'email_exists') {
            echo "<div class='status-message error'>هذا البريد الإلكتروني مستخدم بالفعل. يرجى استخدام بريد آخر.</div>";
        }
        ?>
        <form action="register_logic.php" method="POST">
            <label for="name">الاسم:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">البريد الإلكتروني:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">كلمة المرور:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" name="register" value="إنشاء الحساب">
        </form>
    </div>
</body>
</html>