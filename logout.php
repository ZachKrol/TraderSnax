#!/usr/local/bin/php
<?php
// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION["loggedin"] = false;
$_SESSION["id"] = NULL;
$_SESSION["username"] = NULL;

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: index.php");
