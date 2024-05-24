<?php

include "php_controllers/db_connection.php";

session_start();

if ($_SESSION["permission"] != 'true'){
    // Redirect to index.php
    header("Location: index.php");
    die();
}

// Fetch books data
$books_sql = "SELECT isbn_no, book_name FROM books_details";
$books_result = $conn->query($books_sql);

$books = [];
if ($books_result->num_rows > 0) {
    while ($row = $books_result->fetch_assoc()) {
        $books[] = $row;
    }
}

// Fetch students data
$students_sql = "SELECT nic_no, student_name FROM student_details";
$students_result = $conn->query($students_sql);

$students = [];
if ($students_result->num_rows > 0) {
    while ($row = $students_result->fetch_assoc()) {
        $students[] = $row;
    }
}

$sql = "SELECT * FROM borrows";
$result = $conn->query($sql);

?>

<?php include "layout/upper_section.php";?>

<div class="container-fluid">
    <h1 class="text-center">Borrow Management</h1>
    <hr>

    <form style="margin-left: 150px; margin-right: 150px;" method="POST" action="php_controllers/borrows_register.php">
        <div class="form-group">
            <label for="Book_ISBN_NoInput">Book ISBN No</label>
            <select name="Book_ISBN_No" class="form-control" id="Book_ISBN_NoInput">
                <option value="">Select Book ISBN</option>
                <?php foreach ($books as $book): ?>
                    <option value="<?php echo $book['isbn_no']; ?>"><?php echo $book['isbn_no'] . " - " . $book['book_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="Student_Nic_NoInput">Student Nic No</label>
            <select name="Student_Nic_No" class="form-control" id="Student_Nic_NoInput">
                <option value="">Select Student NIC</option>
                <?php foreach ($students as $student): ?>
                    <option value="<?php echo $student['nic_no']; ?>"><?php echo $student['nic_no'] . " - " . $student['student_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="Handover_DateInput">Handover Date</label>
            <input name="Handover_Date" type="text" class="form-control" id="Handover_DateInput" placeholder="Enter Handover Date">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <h1 class="text-center">Student Details</h1>
    <hr>

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Book ISBN No</th>
                <th scope="col">Student Nic</th>
                <th scope="col">Handover Date</th>
                <th scope="col">Returned</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['book_isbn_no']; ?></td>
                    <td><?php echo $row['student_nic']; ?></td>
                    <td><?php echo $row['handover_date']; ?></td>
                    <td>
                        <form method="POST" action="php_controllers/return.php">
                            <input type="hidden" name="auto_id" value="<?php echo $row['auto_id']; ?>">
                            <button type="submit" class="btn btn-primary">Returned</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include "layout/bottom_section.php"; ?>
