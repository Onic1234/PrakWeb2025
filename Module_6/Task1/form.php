<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Data</title>
</head>
<?php
    $conn = mysqli_connect("localhost", "root", "", "db_library");
?>
<body>
    <center>
        <h3>Enter Book Data:</h3>
        <form action="form.php" method="post">
            <table border="0" width="30%">
                <tr>
                    <td width="25%">Book Code</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="kode_buku" size="10"></td>
                </tr>
                <tr>
                    <td width="25%">Book Name</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="nama_buku" size="30"></td>
                </tr>
                <tr>
                    <td width="25%">Book Type</td>
                    <td width="5%">:</td>
                    <td width="65%">
                        <select name="kode_jenis">
                            <?php
                                $sql = "SELECT * FROM jenis_buku";
                                $retval = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($retval)) {
                                    echo "<option value='$row[kode_jenis]'>$row[nama_jenis]</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><input type="submit" name="submit_buku" value="Send"></td>
                </tr>
            </table>
        </form>

        <h3>Enter Book Type Data:</h3>
        <form action="form.php" method="post">
            <table border="0" width="30%">
                <tr>
                    <td width="25%">Type Code</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="kode_jenis" size="10"></td>
                </tr>
                <tr>
                    <td width="25%">Type Name</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="nama_jenis" size="30"></td>
                </tr>
                <tr>
                    <td width="25%">Description</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="keterangan_jenis" size="50"></td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><input type="submit" name="submit_jenis" value="Send"></td>
                </tr>
            </table>
        </form>

        <?php
        error_reporting(E_ALL ^ E_NOTICE);

        // Handle Book
        $kode_buku = $_POST['kode_buku'];
        $nama_buku = $_POST['nama_buku'];
        $kode_jenis = $_POST['kode_jenis'];
        $submit_buku = $_POST['submit_buku'];
        $input_buku = "INSERT INTO buku (kode_buku, nama_buku, kode_jenis) VALUES ('$kode_buku', '$nama_buku', '$kode_jenis')";

        if ($submit_buku) {
            if ($kode_buku == '') {
                echo "</br> Book Code cannot be empty, fill it first";
            } elseif ($nama_buku == '') {
                echo "</br> Book Name cannot be empty, fill it first";
            } elseif ($kode_jenis == '') {
                echo "</br> Book Type cannot be empty, fill it first";
            } else {
                mysqli_query($conn, $input_buku);
                echo "</br> Data entered successfully";
            }
        }
        
        // Handle Book Type
        $kode_jenis = $_POST['kode_jenis'];
        $nama_jenis = $_POST['nama_jenis'];
        $keterangan_jenis = $_POST['keterangan_jenis'];
        $submit_jenis = $_POST['submit_jenis'];
        $input_jenis = "INSERT INTO jenis_buku (kode_jenis, nama_jenis, keterangan_jenis) VALUES ('$kode_jenis', '$nama_jenis', '$keterangan_jenis')";

        if ($submit_jenis) {
            if ($kode_jenis == '') {
                echo "</br> Type Code cannot be empty, fill it first";
            } elseif ($nama_jenis == '') {
                echo "</br> Type Name cannot be empty, fill it first";
            } elseif ($keterangan_jenis == '') {
                echo "</br> Description cannot be empty, fill it first";
            } else {
                mysqli_query($conn, $input_jenis);
                echo "</br> Data entered successfully";
            }
        }
        ?>

        <hr>
        <h3>Book Data</h3>
        <table border="1" width="50%">
            <tr>
                <td align="center" width="20%"><b>Book Code</b></td>
                <td align="center" width="30%"><b>Book Name</b></td>
                <td align="center" width="50%"><b>Book Type</b></td>
                <td align="center" width="20%"><b>Keterangan</b></td>
            </tr> 
            <?php
            $cari_buku = "SELECT buku.kode_buku, buku.nama_buku, jenis_buku.nama_jenis FROM buku JOIN jenis_buku ON buku.kode_jenis = jenis_buku.kode_jenis";
            $hasil_cari_buku = mysqli_query($conn, $cari_buku);
            while ($data_buku = mysqli_fetch_row($hasil_cari_buku)) {
                echo "
                <tr>
                    <td width='20%'>$data_buku[0]</td>
                    <td width='30%'>$data_buku[1]</td>
                    <td width='10%'>$data_buku[2]</td>
                    <td width='20%'>
                    <a href='edit_buku.php?kode_buku={$data_buku[0]}'>Edit</a> | 
                    <a href='delete.php?kode_buku={$data_buku[0]}' onclick='return confirm(\"Are you sure?\")'>Delete</a>

                    </td>
                </tr>";
            }
            ?>
        </table>

        <h3>Book Type Data</h3>
        <table border="1" width="50%">
            <tr>
                <td align="center" width="20%"><b>Type Code</b></td>
                <td align="center" width="30%"><b>Type Name</b></td>
                <td align="center" width="50%"><b>Description</b></td>
                <td align="center" width="20%"><b>Keterangan</b></td>
            </tr> 
            <?php
            $cari_jenis = "SELECT * FROM jenis_buku ORDER BY kode_jenis";
            $hasil_cari_jenis = mysqli_query($conn, $cari_jenis);
            while ($data_jenis = mysqli_fetch_row($hasil_cari_jenis)) {
                echo "
                <tr>
                    <td width='20%'>$data_jenis[0]</td>
                    <td width='30%'>$data_jenis[1]</td>
                    <td width='50%'>$data_jenis[2]</td>
                    <td width='20%'>
                    <a href='edit_jenis.php?kode_jenis={$data_jenis[0]}'>Edit</a> | 
                    <a href='delete.php?kode_jenis={$data_jenis[0]}' onclick='return confirm(\"Are you sure?\")'>Delete</a>

                    </td>
                </tr>";
            }
            ?>
        </table>
    </center>
</body>

</html>