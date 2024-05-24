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

    $auto_id = $_GET['auto_id'];

    $sql = "SELECT * from books_details where auto_id = '$auto_id'";
    $result = $conn->query($sql);

    $book_name_from_db = "";
    $isbn_no_from_db = "";
    $author_from_db = "";
    $price_from_db = "";
    $release_date_from_db = "";
    $genres_from_db = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $book_name_from_db = $row['book_name'];
            $isbn_no_from_db =  $row['isbn_no'];
            $author_from_db  = $row['author'];
            $price_from_db = $row['price'];
            $release_date_from_db =  $row['release_date'];
            $genres_from_db  = $row['genres'];
                   
        } 
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

    <h1 style="text-align:center;">Edit Book Details</h1>
    <hr>

    <form style="margin-left: 150px; margin-right: 150px;" ACTION="book_edit_2.php" METHOD = "post">
        <div class="form-group">
            <label for="exampleInputEmail1">Book Name</label>
            <input name="book_name" type="text" value="<?php echo $book_name_from_db?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Book Name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">ISBN No</label>
            <input name="isbn_no" type="text" value="<?php echo $isbn_no_from_db?>" class="form-control" id="exampleInputPassword1" placeholder="Enter ISBN No">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Author</label>
            <input name="author" type="text" value="<?php echo $author_from_db?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Author">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input name="price" type="text" value="<?php echo $price_from_db?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Book Price">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Release Date</label>
            <input name="release_date" type="text" value="<?php echo $release_date_from_db?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Age">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Genres</label>
            <input name="genres" type="text" value="<?php echo $genres_from_db?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Marks">
        </div>

        <input style="display:none;" name="auto_id" type="text" value="<?php echo $auto_id?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Marks">

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

    
</body>
</html>