<?php

session_start();

if ($_SESSION["permission"] != 'true') {
    // Redirect to index.php
    header("Location: index.php");
    die();
}

include "db_connection.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if POST variables are set
if (isset($_POST['Book_ISBN_No'], $_POST['Student_Nic_No'], $_POST['Handover_Date'])) {
    $book_isbn_no = $_POST['Book_ISBN_No'];
    $student_nic = $_POST['Student_Nic_No'];
    $handover_date = $_POST['Handover_Date'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO borrows (book_isbn_no, student_nic, handover_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $book_isbn_no, $student_nic, $handover_date);

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
