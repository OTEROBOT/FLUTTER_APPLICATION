<?php
header('Content-Type: application/json; charset=UTF-8');
include "db_connect.php";

mysqli_set_charset($conn, "utf8mb4"); // บังคับให้ใช้ UTF-8

$sql = "SELECT * FROM tasks ORDER BY id DESC";
$query = mysqli_query($conn, $sql);

if (!$query) {
    echo json_encode(["error" => "Query failed: " . mysqli_error($conn)]);
    exit;
}

$resultArray = array();
while ($result = mysqli_fetch_assoc($query)) {
    array_push($resultArray, [
        "id" => intval($result['id']),
        "title" => $result['title'],
        "description" => $result['description']
    ]);
}

mysqli_close($conn);
echo json_encode($resultArray, JSON_UNESCAPED_UNICODE); // ไม่ escape UTF-8
?>
