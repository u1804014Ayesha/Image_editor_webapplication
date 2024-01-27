<?php
session_start(); // Start or resume the session

session_destroy(); // Destroy the session data

header("location: index.php"); // Redirect to the login page

exit(); // Ensure that no further code is executed after the redirection
?>
