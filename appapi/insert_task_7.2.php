<?php
header('Content-Type: application/json');
include "db_connect.php"; // ตรวจสอบให้ใช้ไฟล์ที่ถูกต้อง

// รับค่าจาก POST
$title = $_POST['title'];
$description = $_POST['description'];

// สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูล
$sql = "INSERT INTO tasks(title, description) VALUES('$title', '$description')";

// ทำการ query ข้อมูล
$result = mysqli_query($conn, $sql);

// ตรวจสอบผลการเพิ่มข้อมูล
if ($result) {
    echo json_encode("Success");
} else {
    echo json_encode("Failed");
}
?>
