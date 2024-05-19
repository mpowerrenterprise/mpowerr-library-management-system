<?php

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

    $nic_no= $_POST['nic_no'];
    $student_name = $_POST['student_name'];
    $grade = $_POST['grade'];
    $email= $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO student_details VALUES('',$nic_no, '$student_name', $grade, '$email', $mobile_no, '$gender')";

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