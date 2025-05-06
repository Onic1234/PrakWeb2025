<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessing Session Data</title>
</head>
<body>
    <?php
    $_SESSION['counter']++;
    $_SESSION['visitor_name'] = "Adul";
    echo "Welcome " . $_SESSION['visitor_name'] . "<br>";
    echo "You have visited this page many times: " . $_SESSION['counter'] ." kali.";
    ?>
</body>
</html>