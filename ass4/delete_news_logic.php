<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['auth_user'])) { header("Location: login_ui.php"); exit(); }

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE news SET status = 'deleted' WHERE id = $id";
    if ($connection->query($sql) === TRUE) {
        header("Location: dashboard.php?status=deleted");
        exit();
    }
}
?>