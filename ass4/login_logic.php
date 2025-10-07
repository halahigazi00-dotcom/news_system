<?php
session_start();
include 'connection.php';

if (isset($_POST['login'])) {
    $email = validate_data($_POST['email']);
    $password = validate_data($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        
        if (password_verify($password, $user_data['password'])) {
            $_SESSION['auth_user'] = $user_data;
            header("Location: dashboard.php");
            exit();
        }
    }
    
    header("Location: login_ui.php?error=invalid");
    exit();
}
?>