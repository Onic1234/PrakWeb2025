<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Data</title>
</head>

<body>
    <center>
        <h3>Update Data</h3>
        <?php
        // Menampilkan data yang akan diupdate
        if (isset($_GET['id_perpus'])) {
            $id_perpus = $_GET['id_perpus'];
            $query = "SELECT * FROM perpus WHERE id_perpus='$id_perpus'";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_assoc($result);
        ?>
            <form action="update.php" method="post">
                <input type="hidden" name="id_perpus" value="<?php echo $data['id_perpus']; ?>">
                <table>
                    <tr>
                        <td>Nama Perpustakaan</td>
                        <td>:</td>
                        <td><input type="text" name="nama_perpus" value="<?php echo $data['nama_perpus']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
                    </tr>
                </table>
                <input type="submit" name="update_perpus" value="Update">
            </form>
        <?php
        } elseif (isset($_GET['id_buku'])) {
            $id_buku = $_GET['id_buku'];
            $query = "SELECT * FROM buku WHERE id_buku='$id_buku'";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_assoc($result);
        ?>
            <form action="update.php" method="post">
                <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>">
                <table>
                    <tr>
                        <td>Judul Buku</td>
                        <td>:</td>
                        <td><input type="text" name="judul_buku" value="<?php echo $data['judul_buku']; ?>"></td>
                    </tr>
                    <tr>
                        <td>ID Perpustakaan</td>
                        <td>:</td>
                        <td><input type="text" name="id_perpus" value="<?php echo $data['id_perpus']; ?>"></td>
                    </tr>
                </table>
                <input type="submit" name="update_buku" value="Update">
            </form>
        <?php
        }

        // Proses update data
        if (isset($_POST['update_perpus'])) {
            $id_perpus = $_POST['id_perpus'];
            $nama_perpus = $_POST['nama_perpus'];
            $alamat = $_POST['alamat'];

            $update_query = "UPDATE perpus SET nama_perpus='$nama_perpus', alamat='$alamat' WHERE id_perpus='$id_perpus'";
            mysqli_query($conn, $update_query);
            echo "<script>alert('Data Perpustakaan berhasil diupdate!'); window.location.href='view.php';</script>";
        }

        if (isset($_POST['update_buku'])) {
            $id_buku = $_POST['id_buku'];
            $judul_buku = $_POST['judul_buku'];
            $id_perpus = $_POST['id_perpus'];

            $update_query = "UPDATE buku SET judul_buku='$judul_buku', id_perpus='$id_perpus' WHERE id_buku='$id_buku'";
            mysqli_query($conn, $update_query);
            echo "<script>alert('Data Buku berhasil diupdate!'); window.location.href='view.php';</script>";
        }
        ?>
    </center>
</body>

</html>