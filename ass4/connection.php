<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "news_db"; // تأكد من إنشاء قاعدة بيانات بهذا الاسم

$connection = new mysqli($serverName, $userName, $password, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

function validate_data($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>