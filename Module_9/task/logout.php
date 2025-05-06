<?php
session_start();
session_destroy();
header("Location: task.php");
exit;
