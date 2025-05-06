<?php
session_start();
session_destroy(); 
?>
<script language script="javascript">
    alert("You have logged out");
    document.location = 'login.php';
</script>