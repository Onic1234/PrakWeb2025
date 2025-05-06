<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
$conn = mysqli_connect("localhost", "root", "", "informatika");
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$submit = $_POST['submit'] ?? '';

if ($submit) {
    // Query to check user credentials
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['status'] = $row['status'];

        if ($row['status'] == 'Administrator') {
            header("Location: admin_dashboard.php");
        } elseif ($row['status'] == 'Member') {
            header("Location: member_dashboard.php");
        }
        exit;
    } else {
        echo "<script>alert('Login Failed');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="task.php" method="post">
        <p align="center">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" name="submit" value="Login">
        </p>
    </form>
</body>
</html>