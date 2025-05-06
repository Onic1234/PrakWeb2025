<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
$conn = mysqli_connect('localhost', 'root', '', 'informatika');

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$submit = $_POST['submit'] ?? ''; 

if ($submit) {
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query); // Changed $result to $row
    if ($row['username'] != "") { // Corrected $result to $row
        $_SESSION['username'] = $row['username'];
        $_SESSION['status'] = $row['status'];
        ?>
        <script language script="javascript">
            alert('You are logged in as <?php echo $row['username']; ?>');
            document.location = 'loginresult.php';
        </script>
    <?php
    } else {
    ?>
        <script language script="javascript">
            alert('Login Failed');
            document.location = 'login.php';
        </script>
<?php
    }
}
?>
<form action="login.php" method="post">
    <p align="center">Username : <input type="text" name="username"><br>
        Password : <input type="password" name="password"><br>
        <input type="submit" name="submit" value="Login">
    </p>
</form>
