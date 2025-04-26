<?php include 'koneksi.php'; ?>
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ekskul</title>
</head>

<body>
    <center>
        <h3>Data Siswa</h3>
        <table border="1" width="30%">
            <tr>
                <td width="20%">ID Siswa</td>
                <td width="30%">Nama Siswa</td>
                <td width="30%">Jenis Kelamin</td>
                <td width="20%">Kelas</td>
                <td width="20%">Aksi</td>
            </tr>
            <?php
            $cari = "SELECT * FROM siswa ORDER BY id_siswa";
            $result_siswa = mysqli_query($conn, $cari);
            while ($data = mysqli_fetch_row($result_siswa)) {
                echo "<tr>
                            <td>$data[0]</td>
                            <td>$data[1]</td>
                            <td>$data[2]</td>
                            <td>$data[3]</td>
                            <td>
                                <form action='update.php' method='get' style='display:inline;'>
                                    <input type='hidden' name='id_siswa' value='$data[0]'>
                                    <input type='hidden' name='nama_siswa' value='$data[1]'>
                                    <input type='hidden' name='jenis_kelamin' value='$data[2]'>
                                    <input type='hidden' name='kelas' value='$data[3]'>
                                    <input type='submit' value='update'>
                                </form>
                                <form action='delete.php' method='post' style='display:inline;'>
                                    <input type='hidden' name='id_siswa' value='$data[0]'>
                                    <input type='submit' name='delete_siswa' value='Hapus'>
                                </form>
                            </td>
                          </tr>";
            }
            ?>
        </table>

        <hr>
        <h3>Data Pendaftaran</h3>
        <table border="1" width="30%">
            <tr>
                <td width="20%">ID Pendaftaran</td>
                <td width="30%">Nama Siswa</td>
                <td width="30%">Ekskul</td>
                <td width="20%">Aksi</td>
            </tr>
            <?php
            $cari = "SELECT pendaftaran.id_pendaftaran, siswa.nama_siswa, pendaftaran.ekskul FROM pendaftaran JOIN siswa ON pendaftaran.id_siswa = siswa.id_siswa";
            $result_pendaftaran = mysqli_query($conn, $cari);
            while ($data = mysqli_fetch_row($result_pendaftaran)) {
                echo "<tr>
                            <td>$data[0]</td>
                            <td>$data[1]</td>
                            <td>$data[2]</td>
                            <td>
                                <form action='update.php' method='get' style='display:inline;'>
                                    <input type='hidden' name='id_pendaftaran' value='$data[0]'>
                                    <input type='hidden' name='nama_siswa' value='$data[1]'>
                                    <input type='hidden' name='ekskul' value='$data[2]'>
                                    <input type='submit' value='update'>
                                </form>
                                <form action='delete.php' method='post' style='display:inline;'>
                                    <input type='hidden' name='id_pendaftaran' value='$data[0]'>
                                    <input type='submit' name='delete_pendaftaran' value='Hapus'>
                                </form>
                            </td>
                          </tr>";
            }
            ?>
    </center>
</body>

</html>