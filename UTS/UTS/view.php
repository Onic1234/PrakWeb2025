<?php include 'koneksi.php'; ?>
<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Perpustakaan dan Buku</title>
</head>

<body>
    <center>
        <h3>Data Perpustakaan</h3>
        <table border="1" width="50%">
            <tr>
                <td align="center"><b>ID Perpustakaan</b></td>
                <td align="center"><b>Nama Perpustakaan</b></td>
                <td align="center"><b>Alamat</b></td>
                <td align="center"><b>Keterangan</b></td>
            </tr>
            <?php
            $cari = "SELECT * FROM perpus";
            $hasil = mysqli_query($conn, $cari);
            if (!$hasil) {
                echo "<tr><td colspan='4'>Error: " . mysqli_error($conn) . "</td></tr>";
            } else {
                while ($data = mysqli_fetch_row($hasil)) {
                    echo "<tr>
                            <td>$data[0]</td>
                            <td>$data[1]</td>
                            <td>$data[2]</td>
                            <td>
                                <form action='update.php' method='get' style='display:inline;'>
                                    <input type='hidden' name='id_perpus' value='$data[0]'>
                                    <input type='hidden' name='nama_perpus' value='$data[1]'>
                                    <input type='hidden' name='alamat' value='$data[2]'>
                                    <input type='submit' value='update'>
                                </form>
                                <form action='' method='post' style='display:inline;'>
                                    <input type='hidden' name='id_perpus' value='$data[0]'>
                                    <input type='submit' name='delete_perpus' value='Hapus'>
                                </form>
                            </td>
                          </tr>";
                }
            }

            // Handle Delete Perpustakaan
            if (isset($_POST['delete_perpus'])) {
                $id_perpus = mysqli_real_escape_string($conn, $_POST['id_perpus']);

                // Hapus data terkait di tabel buku
                $delete_related_books = "DELETE FROM buku WHERE id_perpus='$id_perpus'";
                if (!mysqli_query($conn, $delete_related_books)) {
                    echo "<script>alert('Error deleting related books: " . mysqli_error($conn) . "');</script>";
                }

                // Hapus data di tabel perpus
                $delete_query = "DELETE FROM perpus WHERE id_perpus='$id_perpus'";
                if (mysqli_query($conn, $delete_query)) {
                    echo "<script>alert('Perpustakaan berhasil dihapus!'); window.location.href='view.php';</script>";
                } else {
                    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
                }
            }
            ?>
        </table>

        <hr>
        <h3>Data Buku</h3>
        <table border="1" width="50%">
            <tr>
                <td align="center"><b>ID Buku</b></td>
                <td align="center"><b>Judul Buku</b></td>
                <td align="center"><b>Nama Perpustakaan</b></td>
                <td align="center"><b>Keterangan</b></td>
            </tr>
            <?php
            $cari1 = "SELECT buku.id_buku, buku.judul_buku, perpus.nama_perpus 
                      FROM buku 
                      JOIN perpus ON buku.id_perpus = perpus.id_perpus";
            $hasil1 = mysqli_query($conn, $cari1);
            if (!$hasil1) {
                echo "<tr><td colspan='4'>Error: " . mysqli_error($conn) . "</td></tr>";
            } else {
                while ($data1 = mysqli_fetch_row($hasil1)) {
                    echo "<tr>
                            <td>$data1[0]</td>
                            <td>$data1[1]</td>
                            <td>$data1[2]</td>
                            <td>
                                <form action='update.php' method='get' style='display:inline;'>
                                    <input type='hidden' name='id_buku' value='$data1[0]'>
                                    <input type='hidden' name='judul_buku' value='$data1[1]'>
                                    <input type='hidden' name='id_perpus_buku' value='$data1[2]'>
                                    <input type='submit' value='update'>
                                </form>
                                <form action='' method='post' style='display:inline;'>
                                    <input type='hidden' name='id_buku' value='$data1[0]'>
                                    <input type='submit' name='delete_buku' value='Hapus'>
                                </form>
                            </td>
                          </tr>";
                }
            }

            // Handle Delete Buku
            if (isset($_POST['delete_buku'])) {
                $id_buku = mysqli_real_escape_string($conn, $_POST['id_buku']);
                $delete_query = "DELETE FROM buku WHERE id_buku='$id_buku'";
                if (mysqli_query($conn, $delete_query)) {
                    echo "<script>alert('Buku berhasil dihapus!'); window.location.href='view.php';</script>";
                } else {
                    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
                }
            }
            ?>
        </table>
    </center>
</body>

</html>