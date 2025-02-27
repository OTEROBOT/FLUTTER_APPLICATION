<?php
header('Content-Type: application/json');
include "db_connect.php";

// รับค่าจาก GET หรือ POST
$id = (int)$_GET['id']; // หรือ $_POST['id'] ขึ้นอยู่กับวิธีการส่งข้อมูล

// สร้าง query เพื่อดึงข้อมูล
$sql = "SELECT * FROM tasks WHERE id = " . $id;
$query = mysqli_query($conn, $sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if ($query && mysqli_num_rows($query) > 0) {
    $result = mysqli_fetch_assoc($query); // ใช้ mysqli_fetch_assoc()
    $result['id'] = (int)$result['id']; // แปลง id เป็นตัวเลข
    echo json_encode([$result]); // ส่งข้อมูลในรูปแบบ JSON
} else {
    echo json_encode(["error" => "Task not found"]); // ถ้าไม่มีข้อมูล
}

// ปิดการเชื่อมต่อกับฐานข้อมูล
mysqli_close($conn);
?>
