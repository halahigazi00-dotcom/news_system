<?php
include 'connection.php';

if (isset($_POST['register'])) {
    $name = validate_data($_POST['name']);
    $email = validate_data($_POST['email']);
    $password = validate_data($_POST['password']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //  التحقق أولاً إذا كان الإيميل موجوداً
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $connection->query($check_email_sql);

    if ($result->num_rows > 0) {
        // إذا كان الإيميل موجوداً، أعد المستخدم لصفحة التسجيل مع رسالة خطأ
        header("Location: register_ui.php?error=email_exists");
        exit();
    } else {
        // إذا لم يكن الإيميل موجوداً، قم بإضافته
        $insert_sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

        if ($connection->query($insert_sql) === TRUE) {
            // إذا نجحت الإضافة، وجهه لصفحة تسجيل الدخول
            header("Location: login_ui.php?status=created");
            exit();
        } else {
            // في حالة حدوث خطأ آخر غير متوقع
            echo "Error: " . $insert_sql . "<br>" . $connection->error;
        }
    }
}
?>