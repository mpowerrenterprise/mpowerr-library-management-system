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

    $auto_id = $_GET["auto_id"];


    
    $sql = "DELETE FROM student_details where auto_id = $auto_id";

    if ($conn->query($sql) === TRUE) {
        
        // Get the referring URL
        $previousPage = $_SERVER['HTTP_REFERER'];
        
        // Redirect back to the referring URL
        header("Location: $previousPage");
        exit; // Ensure no further code is executed after the redirect
        

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }



?>