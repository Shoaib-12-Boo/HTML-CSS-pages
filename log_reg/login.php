<?php
// session_start();
require 'config.php';

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            header("Location: welcome.php");
            exit();
        } else {
            echo "<script> alert('Invalid password'); </script>";
        }
    } else {
        echo "<script> alert('User not found'); </script>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>

<h2>Login</h2>
<form method="post" action="">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" name="submit" value="Login">
</form>

<p>Don't have an account? <a href="registration.php">Sign up here</a></p>

</body>
</html>
