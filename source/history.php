<?php

include "php_controllers/db_connection.php";

session_start();

if ($_SESSION["permission"] != 'true'){
    // Redirect to index.php
    header("Location: index.php");
    die();
}

$sql = "SELECT * FROM history";
$result = $conn->query($sql);

?>

<?php include "layout/upper_section.php";?>

<div class="container-fluid">
    <h1 class="text-center">History Management</h1>
    <hr>

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Book ISBN No</th>
                <th scope="col">Student Nic</th>
                <th scope="col">Handover Date</th>
                <th scope="col">Returned Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['book_isbn_no']; ?></td>
                    <td><?php echo $row['student_nic']; ?></td>
                    <td><?php echo $row['handover_date']; ?></td>
                    <td><?php echo $row['returned_date']; ?></td>
                    <a href='php_controllers/history_delete_data.php?auto_id={$row['auto_id']}' class='btn btn-danger'>Delete</a>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>

<?php include "layout/bottom_section.php"; ?>
