<?php include 'koneksi.php'; ?>
<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Perpustakaan</title>
</head>

<body>
    <center>
        <h3>Enter Data Perpustakaan</h3>
        <form action="form.php" method="post">
            <table border="0" width="30%">
                <tr>
                    <td width="25%">ID Perpustakaan</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="id_perpus" size="10" value="<?php echo isset($_GET['id_perpus']) ? $_GET['id_perpus'] : '';?>"></td>
                </tr>
                <tr>
                    <td>Nama Perpustakaan</td>
                    <td>:</td>
                    <td><input type="text" name="nama_perpus" size="30" value="<?php echo isset($_GET['nama_perpus']) ? $_GET['nama_perpus'] : '' ; ?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><input type="text" name="alamat" size="30" value="<?php echo isset($_GET['alamat']) ? $_GET['alamat'] : '' ; ?>"></td>
                </tr>
            </table>
            <input type="submit" name="<?php echo isset($_GET['id_perpus']) ? 'update_perpus' : 'submit' ?>" value="<?php echo isset($_GET['id_perpus']) ? 'Update' : 'Send' ;?>">
            <?php if (isset($_GET['id_perpus'])): ?>
                <input type="submit" name="delete_perpus" value="Delete">
            <?php endif; ?>
        </form><br>

        <h3>Enter Data Buku</h3>
        <form action="form.php" method="post">
            <table border="0" width="30%">
                <tr>
                    <td>ID Buku</td>
                    <td>:</td>
                    <td><input type="text" name="id_buku" size="10" value="<?php echo isset($_GET['id_buku']) ? $_GET['id_buku'] : '' ; ?>"></td>
                </tr>
                <tr>
                    <td>Judul Buku</td>
                    <td>:</td>
                    <td><input type="text" name="judul_buku" size="30" value="<?php echo isset($_GET['judul_buku']) ? $_GET['judul_buku'] : '' ; ?>"></td>
                </tr>
                <tr>
                    <td>ID Perpustakaan</td>
                    <td>:</td>
                    <td><input type="text" name="id_perpus_buku" size="30" value="<?php echo isset($_GET['id_perpus']) ? $_GET['id_perpus'] : '' ;?>"></td>
                </tr>
            </table>
            <input type="submit" name="<?php echo isset($_GET['id_buku']) ? 'update_buku' : 'submit_buku' ?>" value="<?php echo isset($_GET['id_buku']) ? 'Update' : 'Send' ;?>">
            <?php if (isset($_GET['id_buku'])): ?>
                <input type="submit" name="delete_buku" value="Delete">
            <?php endif; ?>
        </form>

        <?php
        error_reporting(E_ALL ^ E_NOTICE);

        // Simpan Perpustakaan
        if (isset($_POST['submit'])) {
            $id_perpus = $_POST['id_perpus'];
            $nama_perpus = $_POST['nama_perpus'];
            $alamat = $_POST['alamat'];

            if ($id_perpus == '' || $nama_perpus == '' || $alamat == '') {
                echo "<br>Semua kolom perpustakaan harus diisi.";
            } else {
                $sql = "INSERT INTO perpus (id_perpus, nama_perpus, alamat) VALUES ('$id_perpus', '$nama_perpus', '$alamat')";
                mysqli_query($conn, $sql);
                echo "<br>Data Perpustakaan berhasil disimpan!";
            }
        }

        if (isset($_POST['update_perpus'])) {
            $id_perpus = $_POST['id_perpus'];
            $nama_perpus = $_POST['nama_perpus'];
            $alamat = $_POST['alamat'];

            $update_query_perpus = "UPDATE perpus SET nama_perpus='$nama_perpus', alamat='$alamat' WHERE id_perpus='$id_perpus'";
            mysqli_query($conn, $update_query_perpus);
            echo "<br>Perpustakaan berhasil diupdate!";
        }

        if (isset($_POST['delete_perpus'])) {
            $id_perpus = $_POST['id_perpus'];

            $delete_query_perpus = "DELETE FROM perpus WHERE id_perpus='$id_perpus'";
            mysqli_query($conn, $delete_query_perpus);
            echo "<br>Perpustakaan berhasil dihapus!";
        }

        // Simpan Buku
        if (isset($_POST['submit_buku'])) {
            $id_buku = $_POST['id_buku'];
            $judul = $_POST['judul_buku'];
            $id_perpus_buku = $_POST['id_perpus_buku'];

            if ($id_buku == '' || $judul == '' || $id_perpus_buku == '') {
                echo "<br>Semua kolom buku harus diisi.";
            } else {
                $sql_buku = "INSERT INTO buku (id_buku, judul_buku, id_perpus) VALUES ('$id_buku', '$judul', '$id_perpus_buku')";
                mysqli_query($conn, $sql_buku);
                echo "<br>Data Buku berhasil disimpan!";
            }
        }

        if (isset($_POST['update_buku'])) {
            $id_buku = $_POST['id_buku'];
            $judul = $_POST['judul_buku'];
            $id_perpus_buku = $_POST['id_perpus_buku'];

            $update_query_buku = "UPDATE buku SET judul_buku='$judul', id_perpus='$id_perpus_buku' WHERE id_buku='$id_buku'";
            mysqli_query($conn, $update_query_buku);
            echo "<br>Buku berhasil diupdate!";
        }

        if (isset($_POST['delete_buku'])) {
            $id_buku = $_POST['id_buku'];

            $delete_query_buku = "DELETE FROM buku WHERE id_buku='$id_buku'";
            mysqli_query($conn, $delete_query_buku);
            echo "<br>Buku berhasil dihapus!";
        }
        ?>
    </center>
</body>

</html>