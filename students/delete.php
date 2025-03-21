<?php
require_once "../config/database.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $conn->query("DELETE FROM sinhvien WHERE MaSV='$id'");
    header("Location: index.php");
}
?>
