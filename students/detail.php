<?php
require_once "../config/database.php";

$id = $_GET["id"];

// Sử dụng Prepared Statement để tránh SQL Injection
$stmt = $conn->prepare("SELECT * FROM sinhvien WHERE MaSV = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("❌ Không tìm thấy sinh viên có mã: " . htmlspecialchars($id));
}

$row = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sinh viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            background: white;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .info {
            text-align: left;
            font-size: 16px;
        }

        .info p {
            margin: 10px 0;
            font-weight: bold;
        }

        .info span {
            font-weight: normal;
            color: #555;
        }

        .preview img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #007bff;
        }

        .back-btn {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 16px;
            margin-top: 15px;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Chi tiết sinh viên</h2>
    <div class="preview">
        <?php if (!empty($row['Hinh'])): ?>
            <img src="../uploads/<?= htmlspecialchars($row['Hinh']) ?>" alt="Ảnh sinh viên">
        <?php else: ?>
            <p>Không có ảnh</p>
        <?php endif; ?>
    </div>

    <div class="info">
        <p>Mã SV: <span><?= htmlspecialchars($row['MaSV']) ?></span></p>
        <p>Họ Tên: <span><?= htmlspecialchars($row['HoTen']) ?></span></p>
        <p>Giới Tính: <span><?= htmlspecialchars($row['GioiTinh']) ?></span></p>
        <p>Ngày Sinh: <span><?= date("d/m/Y", strtotime($row['NgaySinh'])) ?></span></p>
        <p>Mã Ngành: <span><?= htmlspecialchars($row['MaNganh']) ?></span></p>
    </div>

    <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i> Quay lại</a>
</div>

</body>
</html>

