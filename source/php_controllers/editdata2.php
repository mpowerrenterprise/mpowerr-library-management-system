<?php

session_start();


if ($_SESSION["permission"] != 'true'){
    // Redirect to dashboard.php
    header("Location: ./index.php");
   die();

}
include "db_connection.php";

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $auto_id = $_POST['auto_id'];
    $new_nic_no = $_POST['nic_no'];
    $new_student_name = $_POST['student_name'];
    $new_grade = $_POST['grade'];
    $new_mobile_no = $_POST['mobile_no'];
    $new_email = $_POST['email'];
    $new_gender = $_POST['gender'];

    $sql = "UPDATE student_details SET nic_no = '$new_nic_no ',  student_name = ' $new_student_name ', grade = '$new_grade',  mobile_no = ' $new_student_name ',  email = ' $new_email',  gender = ' $new_gender ' WHERE auto_id = '$auto_id'";

    if ($conn->query($sql) === TRUE) {
        
            // Redirect to dashboard.php
        header("Location: ../student-management.php");
        exit; // Ensure no further code is executed after the redirect

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
?>