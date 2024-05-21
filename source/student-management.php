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
                <form method="POST" action="php_controllers/register.php">
                    <label for="Book_ISBN_NoInput">NIC Number</label><br>
                        <input type="text" name="nic_no" placeholder="Ender NIC Number" required><br>
                    <label for="Book_ISBN_NoInput">Student Name</label><br>
                        <input type="text" name="student_name" placeholder="Ender Student Name" required><br>
                    <label for="Book_ISBN_NoInput">Grade</label><br>
                        <input type="number" name="Grade" placeholder="Ender Grade" required><br>
                    <label for="Book_ISBN_NoInput">E-mail</label><br>
                        <input type="email" name="Email" placeholder="Ender E-mail" required><br>
                    <label for="Book_ISBN_NoInput">Mobile Number</label><br>
                        <input type="text" name="mobile_no" placeholder="Ender Mobile Number" required><br>
                    <label for="Book_ISBN_NoInput">Gender</label><br>
                        <input type="text" name="gender" placeholder="Ender Gender" required><br>
                        <button type="submit">Submit</button><br>
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
                
