<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goods Data</title>
</head>
<?php
    $conn = mysqli_connect("localhost", "root", "", "warehouse2");
?>
<body>
    <center>
        <h3>Enter Item Data:</h3>
        <form action="form.php" method="post">
            <table border="0" width="30%">
                <tr>
                    <td width="25%">Item Code</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="item_code" size="10"></td>
                </tr>
                <tr>
                    <td width="25%">Item Name</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="item_name" size="30"></td>
                </tr>
                <tr>
                    <td width="25%">Warehouse</td>
                    <td width="5%">:</td>
                    <td width="65%">
                        <select name="warehouse_code">
                            <?php
                                $sql = "SELECT * FROM warehouse";
                                $retval = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($retval)) {
                                    echo "<option value='$row[warehouse_code]'>$row[warehouse_name]</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><input type="submit" name="submit" value="Send"></td>
                </tr>
            </table>
        </form>
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        $item_code = $_POST['item_code'];
        $item_name = $_POST['item_name'];
        $warehouse_code = $_POST['warehouse_code'];
        $submit = $_POST['submit'];
        $input = "INSERT INTO goods (item_code, item_name, warehouse_code) VALUES ('$item_code', '$item_name', '$warehouse_code')";
        if ($submit){
            mysqli_query($conn, $input);
            echo "Data has been added successfully";
        }
        ?>

        <hr>
        <h3>Goods Data</h3>
        <table border="1" width="50%">
            <tr>
                <td align="center" width="20%"><b>Item Code</b></td>
                <td align="center" width="30%"><b>Item Name</b></td>
                <td align="center" width="10%"><b>Warehouse Location</b></td>
            </tr> 
            <?php
            $cari = "SELECT goods.item_code, goods.item_name, warehouse.location FROM goods JOIN warehouse ON goods.warehouse_code = warehouse.warehouse_code";
            $hasil_cari = mysqli_query($conn, $cari);
            while ($data = mysqli_fetch_row($hasil_cari)) {
                echo "
                <tr>
                    <td width='20%'>$data[0]</td>
                    <td width='30%'>$data[1]</td>
                    <td width='10%'>$data[2]</td>
                </tr>";
            }
            ?>
        </table>
    </center>
</body>
</html>