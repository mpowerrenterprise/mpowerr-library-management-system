<?php

session_start();


if ($_SESSION["permission"] != 'true'){
    // Redirect to dashboard.php
    header("Location: index.php");
   die();

}

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "class-system";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $auto_id = $_POST['auto_id'];
    $new_name = $_POST['name'];
    $new_age = $_POST['age'];
    $new_marks = $_POST['marks'];

    $sql = "UPDATE student_details SET name = '$new_name', age = '$new_age', marks = '$new_marks' WHERE auto_id = '$auto_id'";

    if ($conn->query($sql) === TRUE) {
        
            // Redirect to dashboard.php
        header("Location: dashboard.php");
        exit; // Ensure no further code is executed after the redirect

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }



?>