<?php
session_start();
session_destroy();

// Redirect to dashboard.php
header("Location: ../index.php");
exit; // Ensure no further code is executed after the redirect



?>