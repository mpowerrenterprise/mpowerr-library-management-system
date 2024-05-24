<?php
include "php_controllers/db_connection.php";

session_start();

if ($_SESSION["permission"] != 'true') {
    // Redirect to index.php
    header("Location: index.php");
    die();
}

$sql = "SELECT * FROM borrows";
$result = $conn->query($sql);
?>

<?php include "layout/upper_section.php";?>

<div class="container-fluid">
    <h1 class="text-center">Borrow Management</h1>
    <hr>

    <form style="margin-left: 150px; margin-right: 150px;" method="POST" action="register.php">
        <div class="form-group">
            <label for="Book_ISBN_NoInput">Book ISBN No</label>
            <select name="Book_ISBN_No" class="form-control" id="Book_ISBN_NoInput">
                <option value="">Select Book ISBN</option>
            </select>
        </div>
        <div class="form-group">
            <label for="StatusInput">Status</label>
            <input name="Status" type="text" class="form-control" id="StatusInput" placeholder="Enter Status">
        </div>
        <div class="form-group">
            <label for="Student_Nic_NoInput">Student Nic No</label>
            <select name="Student_Nic_No" class="form-control" id="Student_Nic_NoInput">
                <option value="">Select Student NIC</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Handover_DateInput">Handover Date</label>
            <input name="Handover_Date" type="text" class="form-control" id="Handover_DateInput" placeholder="Enter Handover Date">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <h1 class="text-center">Borrow Details</h1>
    <hr>

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Book ISBN No</th>
                <th scope="col">Status</th>
                <th scope="col">Student Nic</th>
                <th scope="col">Handover Date</th>
                <th scope="col">Returned</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['book_isbn_no']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['student_nic_no']; ?></td>
                    <td><?php echo $row['handover_date']; ?></td>
                    <td><?php echo $row['returned'] ? 'Yes' : 'No'; ?></td>
                </tr>
