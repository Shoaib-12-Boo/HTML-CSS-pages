<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>index</title>
</head>
<body>
	<h2>welcome</h2>
	<a href="registration.php">Registration</a><br><br>
	<a href="login.php">Login</a>

</body>
</html>
<?php
// welcome.php

// Start the session
session_start();

// Check if the user is not logged in, redirect to login page
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

// Include the database configuration file if needed
// require 'config.php';

// Display welcome message
echo "Welcome, ".$_SESSION['username']."!<br>";

// Logout button
echo '<a href="logout.php">Logout</a>';
?>

<!-- Add the rest of your welcome page content below -->
