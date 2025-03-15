<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
</head>

<body>
    <center>
        <h3>Enter Student Data :</h3>
        <form action="form1.php" method="post">
            <table border="0" width="30%">
                <tr>
                    <td width="25%">NIM</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="NIM" size="10" value="<?php echo isset($_GET['NIM']) ? $_GET['NIM'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td width="25%">Name</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="Name" size="30" value="<?php echo isset($_GET['Name']) ? $_GET['Name'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td width="25%">Class</td>
                    <td width="5%">:</td>
                    <td width="65%">
                        <input type="radio" name="Class" value="A" <?php echo (isset($_GET['Class']) && $_GET['Class'] == 'A') ? 'checked' : ''; ?>>A
                        <input type="radio" name="Class" value="B" <?php echo (isset($_GET['Class']) && $_GET['Class'] == 'B') ? 'checked' : ''; ?>>B
                        <input type="radio" name="Class" value="C" <?php echo (isset($_GET['Class']) && $_GET['Class'] == 'C') ? 'checked' : ''; ?>>C
                    </td>
                </tr>
                <tr>
                    <td width="25%">Address</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="Address" size="40" value="<?php echo isset($_GET['Address']) ? $_GET['Address'] : ''; ?>"></td>
                </tr>
            </table>
            <input type="submit" name="<?php echo isset($_GET['NIM']) ? 'update' : 'submit'; ?>" value="<?php echo isset($_GET['NIM']) ? 'Update' : 'Send'; ?>">
        </form>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "informatika");
        error_reporting(E_ALL ^ E_NOTICE);
        $nim = $_POST['NIM'];
        $name = $_POST['Name'];
        $class = $_POST['Class'];
        $address = $_POST['Address'];
        $submit = $_POST['submit'];
        $update = $_POST['update'];
        $input = "INSERT INTO student (NIM, Name, Class, Address) VALUES ('$nim', '$name', '$class', '$address')";
        if ($submit) {
            if ($nim == '') {
                echo "</br> NIM cannot be empty, fill it first";
            } elseif ($name == '') {
                echo "</br> Name cannot be empty, fill it first";
            } elseif ($address == '') {
                echo "</br> Address cannot be empty, fill it first";
            } else {
                mysqli_query($conn, $input);
                echo "</br> Data entered successfully";
            }
        }

        if ($update) {
            $update_query = "UPDATE student SET Name='$name', Class='$class', Address='$address' WHERE NIM='$nim'";
            mysqli_query($conn, $update_query);
            echo "</br> Data updated successfully";
        }
        ?>
        <hr>
        <h3>Student</h3>
        <table border="1" width="50%">
            <tr>
                <td align="center" width="20%"><b>NIM</b></td>
                <td align="center" width="30%"><b>Name</b></td>
                <td align="center" width="10%"><b>Class</b></td>
                <td align="center" width="30%"><b>Address</b></td>
                <td align="center" width="10%"><b>Keterangan</b></td>
            </tr>
            <?php
            $search = "SELECT * FROM student ORDER BY NIM";
            $search_results = mysqli_query($conn, $search);
            while ($data = mysqli_fetch_row($search_results)) {
                echo "
                <tr>
                    <td width='20%'>$data[0]</td>
                    <td width='30%'>$data[1]</td>
                    <td width='10%'>$data[2]</td>
                    <td width='30%'>$data[3]</td>
                    <td width='10%'>
                        <form action='edit.php' method='get' style='display:inline;'>
                            <input type='hidden' name='NIM' value='$data[0]'>
                            <input type='hidden' name='Name' value='$data[1]'>
                            <input type='hidden' name='Class' value='$data[2]'>
                            <input type='hidden' name='Address' value='$data[3]'>
                            <input type='submit' value='Ubah'>
                        </form>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </center>
</body>

</html>