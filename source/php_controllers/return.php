<?php
include "db_connection.php";

session_start();

if ($_SESSION["permission"] != 'true'){
    // Redirect to index.php
    header("Location: ../index.php");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $auto_id = $_POST['auto_id'];

    // Fetch the borrow details
    $borrow_sql = "SELECT * FROM borrows WHERE auto_id = ?";
    $stmt = $conn->prepare($borrow_sql);

    if ($stmt === false) {
        die('Error preparing the SQL statement: ' . $conn->error);
    }

    $stmt->bind_param("i", $auto_id);
    $stmt->execute();
    $borrow_result = $stmt->get_result();
    $borrow = $borrow_result->fetch_assoc();

    if ($borrow) {
        // Insert into history
        $history_sql = "INSERT INTO history (book_isbn_no, student_nic, handover_date, returned_date)
                        VALUES (?, ?, ?, NOW())";
        $history_stmt = $conn->prepare($history_sql);

        if ($history_stmt === false) {
            die('Error preparing the history SQL statement: ' . $conn->error);
        }

        $history_stmt->bind_param("sss", $borrow['book_isbn_no'], $borrow['student_nic'], $borrow['handover_date']);
        $history_stmt->execute();

        // Delete from borrows
        $delete_sql = "DELETE FROM borrows WHERE auto_id = ?";
        $delete_stmt = $conn->prepare($delete_sql);

        if ($delete_stmt === false) {
            die('Error preparing the delete SQL statement: ' . $conn->error);
        }

        $delete_stmt->bind_param("i", $auto_id);
        $delete_stmt->execute();
    }

    // Redirect to borrows page
    header("Location: ../borrows.php");
    die();
}
?>
