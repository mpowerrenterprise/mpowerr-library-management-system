<?php
session_start();

if ($_SESSION["permission"] != 'true'){
    // Redirect to index.php
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

$sql = "SELECT * FROM student_details";
$result = $conn->query($sql);

?>

<?php include "layout/upper_section.php";?>

<h1 class="text-center">Students Management</h1>
<hr>
<form style="margin-left: 150px; margin-right: 150px;" method="POST" action="php_controllers/register.php">
    <div class="form-group">
        <label for="Book_ISBN_NoInput">NIC Number</label><br>
        <input type="text" class="form-control" name="nic_no" placeholder="Enter NIC Number" required><br>
    </div>
    <div class="form-group">
        <label for="Book_ISBN_NoInput">Student Name</label><br>
        <input type="text" class="form-control" name="student_name" placeholder="Enter Student Name" required><br>
    </div>
    <div class="form-group">
        <label for="Book_ISBN_NoInput">Grade</label><br>
        <input type="number" class="form-control" name="grade" placeholder="Enter Grade" required><br>
    </div>
    <div class="form-group">
        <label for="Book_ISBN_NoInput">E-mail</label><br>
        <input type="email" class="form-control" name="email" placeholder="Enter E-mail" required><br>
    </div>
    <div class="form-group">
        <label for="Book_ISBN_NoInput">Mobile Number</label><br>
        <input type="text" class="form-control" name="mobile_no" placeholder="Enter Mobile Number" required><br>
    </div>
    <div class="form-group">
        <label for="Book_ISBN_NoInput">Gender</label><br>
        <input type="text" class="form-control" name="gender" placeholder="Enter Gender" required><br>
    </div>
    <button type="submit">Submit</button>
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
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['nic_no']}</td>
                        <td>{$row['student_name']}</td>
                        <td>{$row['grade']}</td>
                        <td>{$row['mobile_no']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['gender']}</td>
                        <td>
                            <a href='edit_student.php?id={$row['auto_id']}' class='btn btn-primary'>Edit</a>
                            <a href='delete_student.php?id={$row['auto_id']}' class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
        }
        ?>
    </tbody>
</table>

<a href="php_controllers/logout.php" class="btn btn-secondary">Logout</a>
</div>

<?php include "layout/bottom_section.php";?>

<?php
$conn->close();
?>
