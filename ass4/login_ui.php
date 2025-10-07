<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2>تسجيل الدخول</h2>
        <?php
        if (isset($_GET['status']) && $_GET['status'] == 'created') {
            echo "<div class='status-message success'>تم إنشاء الحساب بنجاح! يرجى تسجيل الدخول.</div>";
        }
        if (isset($_GET['error'])) {
            echo "<div class='status-message error'>فشل تسجيل الدخول. البريد الإلكتروني أو كلمة المرور غير صحيحة.</div>";
        }
        ?>
        <form action="login_logic.php" method="POST">
            <label for="email">البريد الإلكتروني:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">كلمة المرور:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" name="login" value="تسجيل الدخول">
        </form>
         <p style="text-align:center; margin-top:15px;">
            ليس لديك حساب؟ <a href="register_ui.php">أنشئ حساباً جديداً</a>
        </p>
    </div>
</body>
</html>