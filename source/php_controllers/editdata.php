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

    $auto_id = $_GET['auto_id'];


    $sql = "SELECT * from student_details where auto_id = '$auto_id'";
    $result = $conn->query($sql);


    $name_from_db = "";
    $age_from_db = "";
    $marks_from_db = "";


    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $name_from_db = $row['name'];
            $age_from_db =  $row['age'];
            $marks_from_db  = $row['marks'];
        
            
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

    <h1 style="text-align:center;">Edit Students</h1>
    <hr>


    <form style="margin-left: 150px; margin-right: 150px;" ACTION="/class-system/editdata2.php" METHOD = "post">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" value="<?php echo $name_from_db?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Age</label>
            <input name="age" type="text" value="<?php echo $age_from_db?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Age">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Marks</label>
            <input name="marks" type="text" value="<?php echo $marks_from_db?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Marks">
        </div>

        <input style="display:none;" name="auto_id" type="text" value="<?php echo $auto_id?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Marks">

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

    
</body>
</html>