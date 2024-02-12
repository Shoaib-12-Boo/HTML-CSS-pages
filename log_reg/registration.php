<?php
require 'config.php';
if (isset($_POST["submit"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirmpassword = $_POST["confirmpassword"];

	$duplicate = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
	if (mysqli_num_rows($duplicate) > 0) {
		echo "<script> alert('email has already exsist'); </script>";
	} 
	else {
		if ($password == $confirmpassword) {
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$result1 = "INSERT INTO users VALUES('', '$name', '$email', '$hash')";
			mysqli_query($conn,$result1);
			echo "<script> alert('Registration complete'); </script>";
		} 
		else {
			echo "<script> alert('Password does not match'); </script>";
		}
		
		
	}	
} 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>registration</title>
</head>
<body>
	<h2>Registration</h2>
	<form action="" method="post">
		<label for="name">name</label>
		<input type="text" name="name" id="name" required value=""><br>
		<label for="email">email</label>
		<input type="email" name="email" id="email" required value=""><br>
		<label for="password">password</label>
		<input type="password" name="password" id="password" required value="">
		<br>
		<label for="confirmpassword">confirmpassword</label>
		<input type="password" name="confirmpassword" id="confirmpassword" required value=""><br>
		<input type="submit" name="submit">
	</form>
	<a href="login.php">Login</a>

</body>
</html>