<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Perpustakaan</title>
</head>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_perpustakaan');
?>

<body>
    <center>
        <h3>Enter Data Perpustakaan</h3>
        <form action="form_perpus.php" method="post">
            <table border="0" width="30%">
                <tr>
                    <td width="25%">ID Perpustakaan</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="id_perpus" size="10"></td>
                </tr>
                <tr>
                    <td width="25%">Nama Perpustakaan</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="nama_perpus" size="30"></td>
                </tr>
                <tr>
                    <td width="25%">Alamat</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="alamat" size="30"></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Send">
        </form><br>

        <h3>Enter Data Buku</h3>
        <form action="form_perpus.php" method="post">
            <table border="0" width="30%">
                <tr>
                    <td width="25%">ID Buku</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="id_buku" size="10"></td>
                </tr>
                <tr>
                    <td width="25%">Judul Buku</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="judul_buku" size="30"></td>
                </tr>
                <tr>
                    <td width="25%">ID Perpustakaan</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="id_perpus" size="30"></td>
                </tr>
            </table>
            <input type="submit" name="submit_buku" value="Send">
        </form>

        <?php
        error_reporting(E_ALL ^ E_NOTICE);

        // Handle Perpustakaan
        $id_perpus = $_POST['id_perpus'];
        $nama_perpus = $_POST['nama_perpus'];
        $alamat = $_POST['alamat'];
        $submit = $_POST['submit'];

        $input = "INSERT INTO perpus (id_perpus, nama_perpus, alamat) VALUES ('$id_perpus', '$nama_perpus', '$alamat')";
        if ($submit) {
            if ($id_perpus == '') {
                echo "</br> ID Perpustakaan cannot be empty, fill it first";
            } elseif ($nama_perpus == '') {
                echo "</br> Name cannot be empty";
            } elseif ($alamat == '') {
                echo "</br> Alamat cannot be empty";
            } else {
                mysqli_query($conn, $input);
                echo "</br>Data entered successfully";
            }
        }

        // Handle Buku
        $id_buku = $_POST['id_buku'];
        $judul = $_POST['judul_buku'];
        $id_perpus = $_POST['id_perpus'];
        $submit_buku = $_POST['submit_buku'];
        $input_buku = "INSERT INTO buku (id_buku, judul_buku, id_perpus) VALUES ('$id_buku', '$judul', '$id_perpus')";
        if ($submit_buku) {
            if ($id_buku == '') {
                echo "</br>ID Buku cannot be empty";
            } elseif ($judul == '') {
                echo "</br> Judul cannot be empty";
            } elseif ($id_perpus == '') {
                echo "</br> ID Perpustakaan cannot be empty";
            } else {
                mysqli_query($conn, $input_buku);
                echo "</br>Data entered successfully";
            }
        }
        ?>

        <hr>
        <h3>Data Perpustakaan</h3>
        <table border="1" width="50%">
            <tr>
                <td align="center" width="20%"><b>ID Perpustakaan</b></td>
                <td align="center" width="30%"><b>Nama Perpustakaan</b></td>
                <td align="center" width="40%"><b>Alamat</b></td>
            </tr>
            <?php
            $cari = "SELECT * FROM perpus";
            $search_results = mysqli_query($conn, $cari);
            while ($data = mysqli_fetch_row($search_results)) {
                echo "
                <tr>
                    <td width='20%'>$data[0]</td>
                    <td width='30%'>$data[1]</td>
                    <td width='40%'>$data[2]</td>
                </tr>";
            }
            ?>
        </table>

        <hr>
        <h3>Data Buku</h3>
        <table border="1" width="50%">
            <tr>
                <td align="center" width="20%"><b>ID Buku</b></td>
                <td align="center" width="30%"><b>Judul Buku</b></td>
                <td align="center" width="40%"><b>Nama Perpustakaan</b></td>
            </tr>
            <?php
            $cari1 = "SELECT buku.id_buku, buku.judul_buku, perpus.nama_perpus FROM buku JOIN perpus ON buku.id_perpus = perpus.id_perpus";
            $search_results1 = mysqli_query($conn, $cari1);
            while ($data1 = mysqli_fetch_row($search_results1)) {
                echo "
                <tr>
                    <td width='20%'>$data1[0]</td>
                    <td width='30%'>$data1[1]</td>
                    <td width='40%'>$data1[2]</td>
                </tr>";
            }
            ?>
        </table>
    </center>
</body>

</html>