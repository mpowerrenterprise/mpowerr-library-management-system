<?php
include "php_controllers/db_connection.php";

$sql = "SELECT nic_no, student_name FROM student_details"; // Adjust the table and column names if necessary
$result = $conn->query($sql);

$students = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($students);
?>
