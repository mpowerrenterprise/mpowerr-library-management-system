<?php
session_start();

if ($_SESSION["permission"] != 'true') {
    // Redirect to index.php
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

$auto_id = $_GET['auto_id'];

// Fetch the specific student record
$sql = "SELECT * from student_details where auto_id = '$auto_id'";
$result = $conn->query($sql);

$nic_no_from_db = "";
$student_name_from_db = "";
$grade_from_db = "";
$mobile_no_from_db = "";
$email_from_db = "";
$gender_from_db = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $nic_no_from_db = $row['nic_no'];
            $student_name_from_db = $row['student_name'];
            $grade_from_db = $row['grade'];
            $mobile_no_from_db = $row['mobile_no'];
            $email_from_db = $row['email'];
            $gender_from_db = $row['gender'];
    
        } 
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h1 style="text-align:center;">Edit Student Details</h1>
    <hr>
    <form style="margin-left: 150px; margin-right: 150px;" action="editdata2.php" method="post">
        <div class="form-group">
            <label for="nicNo">NIC No</label>
            <input name="nic_no" type="text" value="<?php echo $nic_no_from_db; ?>" class="form-control" id="nicNo" placeholder="Enter NIC No">
        </div>
        <div class="form-group">
            <label for="studentName">Student Name</label>
            <input name="student_name" type="text" value="<?php echo $student_name_from_db; ?>" class="form-control" id="studentName" placeholder="Enter Student Name">
        </div>
        <div class="form-group">
            <label for="grade">Grade</label>
            <input name="grade" type="text" value="<?php echo $grade_from_db; ?>" class="form-control" id="grade" placeholder="Enter Grade">
        </div>
        <div class="form-group">
            <label for="mobileNo">Mobile No</label>
            <input name="mobile_no" type="text" value="<?php echo $mobile_no_from_db; ?>" class="form-control" id="mobileNo" placeholder="Enter Mobile No">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input name="email" type="text" value="<?php echo $email_from_db; ?>" class="form-control" id="email" placeholder="Enter E-mail">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input name="gender" type="text" value="<?php echo $gender_from_db; ?>" class="form-control" id="gender" placeholder="Enter Gender">
        </div>
        <input type="hidden" name="auto_id" value="<?php echo $auto_id; ?>">
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</body>
</html>