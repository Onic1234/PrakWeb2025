<?php
session_start();
if ($_SESSION['status'] != 'Member') {
    header("Location: task.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard</title>
</head>

<body>
    <h1>Welcome, Member!</h1>
    <p>This is the member dashboard.</p>
    <a href="logout.php">Logout</a>
</body>

</html>