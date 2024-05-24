<?php
include "php_controllers/db_connection.php";

$sql = "SELECT isbn_no, book_name FROM books_details"; // Adjust the table and column names if necessary
$result = $conn->query($sql);

$books = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($books);
?>
