<?php
session_start();
echo "You have successfully logged in as " . $_SESSION['username'] . " And you are registered as " . $_SESSION['status'] . "<br>";

?>
<br>
Please log out by clicking the link <a href="logout.php">Here</a>