<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['auth_user'])) { header("Location: login_ui.php"); exit(); }

if (isset($_POST['add_category'])) {
    $name = validate_data($_POST['category_name']);
    if (!empty($name)) {
        $sql = "INSERT INTO categories (name) VALUES ('$name')";
        if ($connection->query($sql) === TRUE) {
            // إعادة التحميل لنفس الصفحة مع رسالة نجاح
            header("Location: add_category_ui.php?status=success");
            exit();
        }
    }
}
// في حال الفشل أو الدخول المباشر، ابق في الصفحة
header("Location: add_category_ui.php");
exit();
?>