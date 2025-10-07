<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['auth_user'])) { header("Location: login_ui.php"); exit(); }

if (isset($_POST['update_news'])) {
    $id = $_POST['news_id'];
    $title = validate_data($_POST['title']);
    $details = validate_data($_POST['details']);
    $category_id = $_POST['category_id'];

  
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, "uploads/" . $image_name);
        $sql = "UPDATE news SET title = '$title', details = '$details', category_id = '$category_id', image = '$image_name' WHERE id = $id";
    } else {
   
        $sql = "UPDATE news SET title = '$title', details = '$details', category_id = '$category_id' WHERE id = $id";
    }
    
    if ($connection->query($sql) === TRUE) {
        header("Location: dashboard.php?status=updated");
        exit();
    }
}
?>