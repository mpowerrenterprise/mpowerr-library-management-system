<?php

session_start();

if ($_SESSION["permission"] != 'true') {
    // Redirect to dashboard.php
    header("Location: ./index.php");
    die();
}

include "db_connection.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$book_name = $_POST['book_name'];
$isbn_no = $_POST['isbn_no'];
$genres = $_POST['genres'];
$author = $_POST['author'];
$price = $_POST['price'];
$release_date = $_POST['release_date'];

// Prepare the SQL statement
$sql = "INSERT INTO books_details (isbn_no, book_name, author, price, release_date, genres) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Check if prepare() failed and output error
if ($stmt === false) {
    die("Error preparing the SQL statement: " . $conn->error);
}

// Bind the parameters
$stmt->bind_param("ssssss", $isbn_no, $book_name, $author, $price, $release_date, $genres);

if ($stmt->execute()) {
    // Get the referring URL
    $previousPage = $_SERVER['HTTP_REFERER'];
    // Redirect back to the referring URL
    header("Location: $previousPage");
    exit; // Ensure no further code is executed after the redirect
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
