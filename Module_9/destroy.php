<?php
session_start();
$id_session = session_id();
echo "Your session ID is: " . $id_session;
echo "<br><br>";
session_destroy(); 
$id_session2 = session_id(); 
echo "Your session ID after the session data was destroyed: ".$id_session2;
?>