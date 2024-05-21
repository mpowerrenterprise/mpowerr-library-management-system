<?php

session_start();


if ($_SESSION["permission"] != 'true'){
    // Redirect to dashboard.php
    header("Location: ./index.php");
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

    $auto_id = 'student_details';


    $sql = "SELECT id, nic_no, student_name, grade, email, mobile_no, gender FROM student_details";
    $result = $conn->query($sql);


    $nic_no_db = "";
    $student_name_db = "";
    $grade_db = "";
    $mobile_no_db = "";
    $email_db = "";
    $gender_db = "";


    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $nic_no_db = $row['nic_no'];
            $student_name_db =  $row['student_name'];
            $grade_db  = $row['grade'];
            $mobile_no_db = $row['mobile_no'];
            $email_db =  $row['email'];
            $gender_db  = $row['gender'];
        
            
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

    <h1 style="text-align:center;">Edit Students Details</h1>
    <hr>


    <form style="margin-left: 150px; margin-right: 150px;" ACTION="editdata2.php" METHOD = "post">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" value="<?php echo $name_from_db?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">NIC No</label>
            <input name="name" type="text" value="<?php echo $name_from_db?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Student Name</label>
            <input name="name" type="text" value="<?php echo $name_from_db?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Grade</label>
            <input name="name" type="text" value="<?php echo $name_from_db?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mobile No</label>
            <input name="age" type="text" value="<?php echo $age_from_db?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Age">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">E-mail</label>
            <input name="marks" type="text" value="<?php echo $marks_from_db?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Marks">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">E-mail</label>
            <input name="marks" type="text" value="<?php echo $marks_from_db?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Marks">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Gender</label>
            <input name="marks" type="text" value="<?php echo $marks_from_db?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Marks">
        </div>
        
        <input style="display:none;" name="auto_id" type="text" value="<?php echo $auto_id?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Marks">

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

    
</body>
</html>