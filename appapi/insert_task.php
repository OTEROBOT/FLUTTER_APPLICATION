<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $group = $_POST['group'];

    // คำสั่ง SQL สำหรับเพิ่มข้อมูล
    $query = "INSERT INTO tasks (title, description, firstname, lastname, email, phone, group_name) 
              VALUES ('$title', '$description', '$firstname', '$lastname', '$email', '$phone', '$group')";

    if (mysqli_query($conn, $query)) {
        echo json_encode(array('message' => 'Task inserted successfully'));
    } else {
        echo json_encode(array('message' => 'Failed to insert task'));
    }
}

mysqli_close($conn);
?>
