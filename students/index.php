<?php
require_once "../config/database.php";

$sql = "SELECT * FROM sinhvien";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Danh sách sinh viên</h2>
    <a href="create.php">Thêm sinh viên</a>
    <table border="1">
        <tr>
            <th>Mã SV</th>
            <th>Họ Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Hình</th>
            <th>Ngành</th>
            <th>Hành động</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?= $row['MaSV'] ?></td>
            <td><?= $row['HoTen'] ?></td>
            <td><?= $row['GioiTinh'] ?></td>
            <td><?= $row['NgaySinh'] ?></td>
            <td><img src="../uploads/<?= $row['Hinh'] ?>" width="80"></td>
            <td><?= $row['MaNganh'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['MaSV'] ?>">Sửa</a> |
                <a href="detail.php?id=<?= $row['MaSV'] ?>">Xem</a> |
                <a href="delete.php?id=<?= $row['MaSV'] ?>" onclick="return confirm('Xóa sinh viên này?');">Xóa</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
