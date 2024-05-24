<?php

session_start();


if ($_SESSION["permission"] != 'true'){
    // Redirect to dashboard.php
    header("Location: index.php");
   die();

}

include "db_connection.php";

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $auto_id = $_POST['auto_id'];
    $book_name = $_POST['book_name'];
    $isbn_no =  $_POST['isbn_no'];
    $author  = $_POST['author'];
    $price = $_POST['price'];
    $release_date =  $_POST['release_date'];
    $genres  = $_POST['genres'];

    $sql = "UPDATE books_details SET book_name = '$new_book_name', isbn_no = '$new_isbn_no', author = '$new_author', price = '$new_price', release_date  = '$new_$release_date ', genres = '$new_genres' WHERE auto_id = '$auto_id'";

    if ($conn->query($sql) === TRUE) {
        
            // Redirect to dashboard.php
        header("Location: ../books-management.php");
        exit; // Ensure no further code is executed after the redirect

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
?>