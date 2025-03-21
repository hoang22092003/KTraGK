<?php
require_once "../config/database.php";

$id = $_GET["id"];
$result = $conn->query("SELECT * FROM sinhvien WHERE MaSV='$id'");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoTen = $_POST["HoTen"];
    $gioiTinh = $_POST["GioiTinh"];
    $ngaySinh = $_POST["NgaySinh"];
    $maNganh = $_POST["MaNganh"];

    $sql = "UPDATE sinhvien SET HoTen='$hoTen', GioiTinh='$gioiTinh', NgaySinh='$ngaySinh', MaNganh='$maNganh' WHERE MaSV='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa sinh viên</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 90%;
            max-width: 500px;
        }
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        label {
            font-weight: 600;
            text-align: left;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }
        button {
            background: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Chỉnh sửa sinh viên</h2>
        <form action="edit.php?id=<?= $id ?>" method="post">
            <label>Họ Tên:</label>
            <input type="text" name="HoTen" value="<?= $row['HoTen'] ?>" required>
            
            <label>Giới Tính:</label>
            <select name="GioiTinh">
                <option value="Nam" <?= ($row['GioiTinh'] == 'Nam') ? 'selected' : '' ?>>Nam</option>
                <option value="Nữ" <?= ($row['GioiTinh'] == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
            </select>
            
            <label>Ngày Sinh:</label>
            <input type="date" name="NgaySinh" value="<?= $row['NgaySinh'] ?>" required>
            
            <button type="submit">Lưu</button>
        </form>
    </div>
</body>
</html>
