<?php
session_start();

if ($_SESSION["permission"] != 'true') {
    // Redirect to index.php
    header("Location: ../index.php");
    die();
}

include "db_connection.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$auto_id = $_GET["auto_id"];

if (is_numeric($auto_id)) {
    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM history WHERE auto_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Error preparing the SQL statement: ' . $conn->error);
    }

    $stmt->bind_param("i", $auto_id);
    if ($stmt->execute()) {
        // Get the referring URL
        $previousPage = $_SERVER['HTTP_REFERER'];
        
        // Redirect back to the referring URL
        header("Location: $previousPage");
        exit; // Ensure no further code is executed after the redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
} else {
    echo "Invalid ID.";
}

$conn->close();
?>
