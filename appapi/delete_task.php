<?php
header('Content-Type: application/json');
include "db_connect.php";

// รับค่าจาก POST
$id = (int)$_POST['id'];

// สร้าง query เพื่อทำการลบข้อมูล
$sql = "DELETE FROM tasks WHERE id = $id";
$query = mysqli_query($conn, $sql);

// ตรวจสอบผลการลบข้อมูล
if ($query) {
    echo json_encode("Success");
} else {
    echo json_encode("Failed");
}
?>
