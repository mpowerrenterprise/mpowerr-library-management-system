<?php
session_start();
session_destroy();

// Redirect to index.php
header("Location: C:/xampp/htdocs/mpowerr-library-management-system/source/index.php");
exit; // Ensure no further code is executed after the redirect
?>