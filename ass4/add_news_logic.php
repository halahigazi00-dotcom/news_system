<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['auth_user'])) { header("Location: login_ui.php"); exit(); }

if (isset($_POST['add_news'])) {
    $title = validate_data($_POST['title']);
    $details = validate_data($_POST['details']);
    $category_id = $_POST['category_id'];
    $user_id = $_SESSION['auth_user']['id'];
    $image_name = "";

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0 && !empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, "uploads/" . $image_name);
    }

    $sql = "INSERT INTO news (title, details, image, category_id, user_id) VALUES ('$title', '$details', '$image_name', '$category_id', '$user_id')";
    
    if ($connection->query($sql) === TRUE) {
        // إعادة التحميل لنفس الصفحة مع رسالة نجاح
        header("Location: add_news_ui.php?status=success");
        exit();
    }
}
?>