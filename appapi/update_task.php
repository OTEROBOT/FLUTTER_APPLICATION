<?php
header('Content-Type: application/json');
include "db_connect.php";

// รับค่าจาก POST
$id = (int)$_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];

// สร้าง query เพื่อทำการอัปเดตข้อมูล
$sql = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = $id";
$query = mysqli_query($conn, $sql);

// ตรวจสอบผลการอัปเดตข้อมูล
if ($query) {
    echo json_encode("Success");
} else {
    echo json_encode("Failed");
}
?>
