<?php
session_start();
if (!isset($_SESSION["masv"])) {
    header("Location: login.php"); // Nếu chưa đăng nhập, quay về login
    exit();
}
require_once "database.php";

// Lấy thông tin sinh viên từ MSSV
$masv = $_SESSION["masv"];
$sql = "SELECT name FROM students WHERE masv = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $masv);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
$name = $student["name"] ?? "Không xác định";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
</head>
<body>
    <h2>Chào mừng, <?= htmlspecialchars($name) ?> (MSSV: <?= htmlspecialchars($masv) ?>)!</h2>
    <a href="logout.php">Đăng xuất</a>
</body>
</html>