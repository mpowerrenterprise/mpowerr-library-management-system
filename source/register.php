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
    $db_name = "mpowerr_lms_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $marks = $_POST['marks'];

    $sql = "INSERT INTO student_details VALUES('','$name', $age, $marks)";

    if ($conn->query($sql) === TRUE) {
        
      // Get the referring URL
      $previousPage = $_SERVER['HTTP_REFERER'];
        
      // Redirect back to the referring URL
      header("Location: $previousPage");
      exit; // Ensure no further code is executed after the redirect
     

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();




?>