<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "Test1";

// Kết nối database
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
