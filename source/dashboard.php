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

// Fetch student details
$sql = "SELECT * FROM student_details";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Management</title>
    <link rel="stylesheet" href="source/dash.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style>
    body{
        background-color:wheat;
        border: solid;
    }

input{
    height: 50px;
    width: 40px;
}
.form-group{
    color:black;
    margin-right: 50%;
}
.form-control{
    height: 35px;
    width: 270px;
}
.btn{
    margin-right: 50%;
    background-color: blue;
}
.dark{
    width: 800px;
    background-color: black;
    color:white;
}
</style>
<body>
    <h1 class="text-center">Students Management</h1>
    <hr>

    <form style="margin-left: 150px; margin-right: 150px;" action="php_controllers/register.php" method="post">
        <div class="form-group">
            <label for="nic-noInput">NIC No</label>
            <input name="name" type="text" class="form-control" id="nameInput" placeholder=" Ender NIC No">
        </div>
        <div class="form-group">
            <label for="student-nameInput">Student Name</label>
            <input name="age" type="text" class="form-control" id="ageInput" placeholder="Enter Student Name">
        </div>
        </div>
        <div class="form-group">
            <label for="ageInput">Grade</label>
            <input name="age" type="text" class="form-control" id="ageInput" placeholder="Enter Grade">
        </div>
        </div>
        <div class="form-group">
            <label for="ageInput">E-mail</label>
            <input name="age" type="text" class="form-control" id="ageInput" placeholder="Enter E-mail Address">
        </div>
        </div>
        <div class="form-group">
            <label for="ageInput">Mobile N</label>
            <input name="age" type="text" class="form-control" id="ageInput" placeholder="Enter Mobile No">
        </div>
        <div class="form-group">
            <label for="marksInput">Gender</label>
            <input name="marks" type="text" class="form-control" id="marksInput" placeholder="Enter the Gender">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <h1 class="text-center">Student Management</h1>
    <hr>

    <table class="dark">
        <thead>
            <tr>
                <th scope="col">NIC No</th>
                <th scope="col">Student Name</th>
                <th scope="col">Grade</th>
                <th scope="col">Mobile No</th>
                <th scope="col">E-mail</th>
                <th scope="col">Gender</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nic_no'] . "</td>";
                    echo "<td>" . $row['student_name'] . "</td>";
                    echo "<td>" . $row['grade'] . "</td>";
                    echo "<td>" . $row['mobile_no'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td><a href='deletedata.php?auto_id=" . $row['auto_id'] . "' class='btn btn-danger'>Delete</a> | <a href='editdata.php?auto_id=" . $row['auto_id'] . "' class='btn btn-success'>Edit</a></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <a href="php_controllers/logout.php" style="margin: 10px;" class="btn">Logout</a>
</body>
</html>
