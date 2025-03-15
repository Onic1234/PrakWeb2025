<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang dan Barang</title>
</head>

<body>
    <center>
        <h3>Enter Gudang Data :</h3>
        <form action="warehouse.php" method="post">
            <table border="0" width="30%">
                <tr>
                    <td width="25%">Kode Gudang</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="kode_gudang" size="10" value="<?php echo isset($_GET['kode_gudang']) ? $_GET['kode_gudang'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td width="25%">Nama Gudang</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="nama_gudang" size="30" value="<?php echo isset($_GET['nama_gudang']) ? $_GET['nama_gudang'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td width="25%">Lokasi</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="lokasi" size="40" value="<?php echo isset($_GET['lokasi']) ? $_GET['lokasi'] : ''; ?>"></td>
                </tr>
            </table>
            <input type="submit" name="<?php echo isset($_GET['kode_gudang']) ? 'update_gudang' : 'submit_gudang'; ?>" value="<?php echo isset($_GET['kode_gudang']) ? 'Update' : 'Send'; ?>">
        </form>

        <h3>Enter Barang Data :</h3>
        <form action="warehouse.php" method="post">
            <table border="0" width="30%">
                <tr>
                    <td width="25%">Kode Barang</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="kode_barang" size="10" value="<?php echo isset($_GET['kode_barang']) ? $_GET['kode_barang'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td width="25%">Nama Barang</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="nama_barang" size="30" value="<?php echo isset($_GET['nama_barang']) ? $_GET['nama_barang'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td width="25%">Kode Gudang</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="kode_gudang_barang" size="10" value="<?php echo isset($_GET['kode_gudang_barang']) ? $_GET['kode_gudang_barang'] : ''; ?>"></td>
                </tr>
            </table>
            <input type="submit" name="<?php echo isset($_GET['kode_barang']) ? 'update_barang' : 'submit_barang'; ?>" value="<?php echo isset($_GET['kode_barang']) ? 'Update' : 'Send'; ?>">
        </form>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "warehouse");
        error_reporting(E_ALL ^ E_NOTICE);

        // Handle Gudang
        $kode_gudang = $_POST['kode_gudang'];
        $nama_gudang = $_POST['nama_gudang'];
        $lokasi = $_POST['lokasi'];
        $submit_gudang = $_POST['submit_gudang'];
        $update_gudang = $_POST['update_gudang'];
        $input_gudang = "INSERT INTO gudang (kode_gudang, nama_gudang, lokasi) VALUES ('$kode_gudang', '$nama_gudang', '$lokasi')";

        if ($submit_gudang) {
            if ($kode_gudang == '') {
                echo "</br> Kode Gudang cannot be empty, fill it first";
            } elseif ($nama_gudang == '') {
                echo "</br> Nama Gudang cannot be empty, fill it first";
            } elseif ($lokasi == '') {
                echo "</br> Lokasi cannot be empty, fill it first";
            } else {
                mysqli_query($conn, $input_gudang);
                echo "</br> Data entered successfully";
            }
        }

        if ($update_gudang) {
            $update_query_gudang = "UPDATE gudang SET nama_gudang='$nama_gudang', lokasi='$lokasi' WHERE kode_gudang='$kode_gudang'";
            mysqli_query($conn, $update_query_gudang);
            echo "</br> Data updated successfully";
        }

        // Handle Barang
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $kode_gudang_barang = $_POST['kode_gudang_barang'];
        $submit_barang = $_POST['submit_barang'];
        $update_barang = $_POST['update_barang'];
        $input_barang = "INSERT INTO barang (kode_barang, nama_barang, kode_gudang) VALUES ('$kode_barang', '$nama_barang', '$kode_gudang_barang')";

        if ($submit_barang) {
            if ($kode_barang == '') {
                echo "</br> Kode Barang cannot be empty, fill it first";
            } elseif ($nama_barang == '') {
                echo "</br> Nama Barang cannot be empty, fill it first";
            } elseif ($kode_gudang_barang == '') {
                echo "</br> Kode Gudang cannot be empty, fill it first";
            } else {
                mysqli_query($conn, $input_barang);
                echo "</br> Data entered successfully";
            }
        }

        if ($update_barang) {
            $update_query_barang = "UPDATE barang SET nama_barang='$nama_barang', kode_gudang='$kode_gudang_barang' WHERE kode_barang='$kode_barang'";
            mysqli_query($conn, $update_query_barang);
            echo "</br> Data updated successfully";
        }
        ?>

        <hr>
        <h3>Gudang</h3>
        <table border="1" width="50%">
            <tr>
                <td align="center" width="20%"><b>Kode Gudang</b></td>
                <td align="center" width="30%"><b>Nama Gudang</b></td>
                <td align="center" width="30%"><b>Lokasi</b></td>
                <td align="center" width="20%"><b>Keterangan</b></td>
            </tr>
            <?php
            $search_gudang = "SELECT * FROM gudang ORDER BY kode_gudang";
            $search_results_gudang = mysqli_query($conn, $search_gudang);
            while ($data_gudang = mysqli_fetch_row($search_results_gudang)) {
                echo "
                <tr>
                    <td width='20%'>$data_gudang[0]</td>
                    <td width='30%'>$data_gudang[1]</td>
                    <td width='30%'>$data_gudang[2]</td>
                    <td width='20%'>
                        <form action='edit.php' method='get' style='display:inline;'>
                            <input type='hidden' name='kode_gudang' value='$data_gudang[0]'>
                            <input type='hidden' name='nama_gudang' value='$data_gudang[1]'>
                            <input type='hidden' name='lokasi' value='$data_gudang[2]'>
                            <input type='submit' value='Ubah'>
                        </form>
                        <form action='delete.php' method='post' style='display:inline;'>
                            <input type='hidden' name='kode_gudang' value='$data_gudang[0]'>
                            <input type='submit' name='delete_gudang' value='Hapus'>
                        </form>
                    </td>
                </tr>";
            }
            ?>
        </table>

        <hr>
        <h3>Barang</h3>
        <table border="1" width="50%">
            <tr>
                <td align="center" width="20%"><b>Kode Barang</b></td>
                <td align="center" width="30%"><b>Nama Barang</b></td>
                <td align="center" width="30%"><b>Kode Gudang</b></td>
                <td align="center" width="20%"><b>Keterangan</b></td>
            </tr>
            <?php
            $search_barang = "SELECT * FROM barang ORDER BY kode_barang";
            $search_results_barang = mysqli_query($conn, $search_barang);
            while ($data_barang = mysqli_fetch_row($search_results_barang)) {
                echo "
                <tr>
                    <td width='20%'>$data_barang[0]</td>
                    <td width='30%'>$data_barang[1]</td>
                    <td width='30%'>$data_barang[2]</td>
                    <td width='20%'>
                        <form action='edit.php' method='get' style='display:inline;'>
                            <input type='hidden' name='kode_barang' value='$data_barang[0]'>
                            <input type='hidden' name='nama_barang' value='$data_barang[1]'>
                            <input type='hidden' name='kode_gudang_barang' value='$data_barang[2]'>
                            <input type='submit' value='Ubah'>
                        </form>
                        <form action='delete.php' method='post' style='display:inline;'>
                            <input type='hidden' name='kode_barang' value='$data_barang[0]'>
                            <input type='submit' name='delete_barang' value='Hapus'>
                        </form>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </center>
</body>

</html>