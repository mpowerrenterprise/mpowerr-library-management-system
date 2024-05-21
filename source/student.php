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

    $sql = "SELECT * from student_details";
    $result = $conn->query($sql);
    
?>

<?php include "layout/upper_section.php";?>

<div class="container-fluid">
    
        <h1 class="text-center">Students Management</h1>
                <hr>

        <form style="margin-left: 150px; margin-right: 150px;" action="php_controllers/register.php" method="post">
            <div class="form-group">
                <label for="nicInput">NIC No</label>
                <input name="nic" type="text" class="form-control" id="nicInput" placeholder="Enter NIC No">
            </div>
            <div class="form-group">
                <label for="studentNameInput">Student Name</label>
                <input name="student_name" type="text" class="form-control" id="studentNameInput" placeholder="Enter Student Name">
            </div>
            <div class="form-group">
                <label for="gradeInput">Grade</label>
                <input name="grade" type="text" class="form-control" id="gradeInput" placeholder="Enter Grade">
            </div>
            <div class="form-group">
                <label for="emailInput">E-mail</label>
                <input name="email" type="email" class="form-control" id="emailInput" placeholder="Enter E-mail Address">
            </div>
            <div class="form-group">
                <label for="mobileInput">Mobile No</label>
                <input name="mobile" type="text" class="form-control" id="mobileInput" placeholder="Enter Mobile No">
            </div>
            <div class="form-group">
                <label for="genderInput">Gender</label>
                <input name="gender" type="text" class="form-control" id="genderInput" placeholder="Enter Gender">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <h1 class="text-center">Student Details</h1>
        <hr>

        <table class="table table-dark">
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
                <!-- Student records will go here -->
            </tbody>
        </table>

        <a href="php_controllers/logout.php" class="btn btn-secondary">Logout</a>
</div>


<?php include "layout/bottom_section.php";?>
                
