<?php

session_start();

if ($_SESSION["permission"] != 'true'){
    // Redirect to index.php
    header("Location: index.php");
    die();
}

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "mpowerr_lms_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if POST variables are set
if (isset($_POST['nic_no'], $_POST['student_name'], $_POST['grade'], $_POST['email'], $_POST['mobile_no'], $_POST['gender'])) {
    $nic_no = $_POST['nic_no'];
    $student_name = $_POST['student_name'];
    $grade = $_POST['grade'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $gender = $_POST['gender'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO student_details (nic_no, student_name, grade, email, mobile_no, gender) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $nic_no, $student_name, $grade, $email, $mobile_no, $gender);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the referring URL
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error: Required form data is missing.";
}

// Close the connection
$conn->close();

?>
