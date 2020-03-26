<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();

$_SESSION['loggedin'] = FALSE;
 
// Redirect to login page
header("location: home.php");
exit;
?>