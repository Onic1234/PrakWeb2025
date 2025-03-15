<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>

<body>
    <center>
        <h3>Edit Student Data :</h3>
        <form action="edit.php" method="post">
            <table border="0" width="30%">
                <tr>
                    <td width="25%">NIM</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="NIM" size="10" value="<?php echo $_GET['NIM']; ?>" readonly></td>
                </tr>
                <tr>
                    <td width="25%">Name</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="Name" size="30" value="<?php echo $_GET['Name']; ?>"></td>
                </tr>
                <tr>
                    <td width="25%">Class</td>
                    <td width="5%">:</td>
                    <td width="65%">
                        <input type="radio" name="Class" value="A" <?php echo ($_GET['Class'] == 'A') ? 'checked' : ''; ?>>A
                        <input type="radio" name="Class" value="B" <?php echo ($_GET['Class'] == 'B') ? 'checked' : ''; ?>>B
                        <input type="radio" name="Class" value="C" <?php echo ($_GET['Class'] == 'C') ? 'checked' : ''; ?>>C
                    </td>
                </tr>
                <tr>
                    <td width="25%">Address</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="Address" size="40" value="<?php echo $_GET['Address']; ?>"></td>
                </tr>
            </table>
            <input type="submit" name="update" value="Update">
        </form>
        <?php
        if (isset($_POST['update'])) {
            $conn = mysqli_connect("localhost", "root", "", "informatika");
            $nim = $_POST['NIM'];
            $name = $_POST['Name'];
            $class = $_POST['Class'];
            $address = $_POST['Address'];
            $update_query = "UPDATE student SET Name='$name', Class='$class', Address='$address' WHERE NIM='$nim'";
            mysqli_query($conn, $update_query);
            echo "</br> Data updated successfully";
            header("Location: form1.php");
        }
        ?>
    </center>
</body>

</html>