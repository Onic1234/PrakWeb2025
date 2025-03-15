<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<body>
    <center>
        <h3>Edit Data :</h3>
        <form action="warehouse.php" method="post">
            <?php if (isset($_GET['kode_gudang'])): ?>
                <table border="0" width="30%">
                    <tr>
                        <td width="25%">Kode Gudang</td>
                        <td width="5%">:</td>
                        <td width="65%"><input type="text" name="kode_gudang" size="10" value="<?php echo $_GET['kode_gudang']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td width="25%">Nama Gudang</td>
                        <td width="5%">:</td>
                        <td width="65%"><input type="text" name="nama_gudang" size="30" value="<?php echo $_GET['nama_gudang']; ?>"></td>
                    </tr>
                    <tr>
                        <td width="25%">Lokasi</td>
                        <td width="5%">:</td>
                        <td width="65%"><input type="text" name="lokasi" size="40" value="<?php echo $_GET['lokasi']; ?>"></td>
                    </tr>
                </table>
                <input type="submit" name="update_gudang" value="Update">
            <?php elseif (isset($_GET['kode_barang'])): ?>
                <table border="0" width="30%">
                    <tr>
                        <td width="25%">Kode Barang</td>
                        <td width="5%">:</td>
                        <td width="65%"><input type="text" name="kode_barang" size="10" value="<?php echo $_GET['kode_barang']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td width="25%">Nama Barang</td>
                        <td width="5%">:</td>
                        <td width="65%"><input type="text" name="nama_barang" size="30" value="<?php echo $_GET['nama_barang']; ?>"></td>
                    </tr>
                    <tr>
                        <td width="25%">Kode Gudang</td>
                        <td width="5%">:</td>
                        <td width="65%"><input type="text" name="kode_gudang_barang" size="10" value="<?php echo $_GET['kode_gudang_barang']; ?>"></td>
                    </tr>
                </table>
                <input type="submit" name="update_barang" value="Update">
            <?php endif; ?>
        </form>
    </center>
</body>

</html>