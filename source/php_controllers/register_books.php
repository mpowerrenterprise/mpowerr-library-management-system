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
if (isset($_POST['isbn_no'], $_POST['book_name'], $_POST['auther'], $_POST['price'], $_POST['release_date'], $_POST['genres'])) {
    $isbn_no = $_POST['isbn_no'];
    $book_name = $_POST['book_name'];
    $auther = $_POST['auther'];
    $price = $_POST['price'];
    $release_date = $_POST['release_date'];
    $genres = $_POST['genres'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO student_details (nic_no, student_name, grade, email, mobile_no, gender) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $isbn_no, $book_name, $auther, $price, $release_date, $genres);

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
