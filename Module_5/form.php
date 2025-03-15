<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
</head>

<?php
    $conn = mysqli_connect("localhost", "root", "", "informatika");
?>

<body>
    <center>
        <h3>Enter Student Data :</h3>
        <form action="form.php" method="post">
            <table border="0" width="30%">
                <tr>
                    <td width="25%">NIM</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="NIM" size="10"></td>
                </tr>
                <tr>
                    <td width="25%">Name</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="Name" size="30"></td>
                </tr>
                <tr>
                    <td width="25%">Class</td>
                    <td width="5%">:</td>
                    <td width="65%">
                        <input type="radio" checked name="Class" value="A">A
                        <input type="radio" value="B" name="Class">B
                        <input type="radio" value="C" name="Class">C
                    </td>
                </tr>
                <tr>
                    <td width="25%">Address</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="Address" size="40"></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Send">
        </form>
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        $nim = $_POST['NIM'];
        $name = $_POST['Name'];
        $class = $_POST['Class'];
        $address = $_POST['Address'];
        $submit = $_POST['submit'];
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
        ?>
        <hr>   
        <h3>Student</h3>
        <table border="1" width="50%">
            <tr>
                <td align="center" width="20%"><b>NIM</b></td>
                <td align="center" width="30%"><b>Name</b></td>
                <td align="center" width="10%"><b>Class</b></td>
                <td align="center" width="30%"><b>Address</b></td>
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
                </tr>";
            }
            ?>
        </table>
    </center>
</body>

</html>