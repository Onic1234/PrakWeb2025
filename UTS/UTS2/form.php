<?php

use Dom\Mysql;

include 'koneksi.php'; ?>
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
</head>

<body>
    <center>
        <!-- Form Siswa -->
        <form action="form.php" method="post">
            <table border="0" width="30%">
                <tr>
                    <td width="25%">ID Siswa</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="id_siswa" size="10" value="<?php echo isset($_GET['id_siswa']) ? $_GET['id_siswa'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td width="25%">Nama Siswa</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="nama_siswa" size="50" value="<?php echo isset($_GET['nama_siswa']) ? $_GET['nama_siswa'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td width="25%">Jenis Kelamin</td>
                    <td width="5%">:</td>
                    <td width="65%">
                        <input type="radio" name="jenis_kelamin" value="Pria" <?php echo (isset($_GET['jenis_kelamin']) && $_GET['jenis_kelamin'] == 'Pria') ? 'checked' : ''; ?>>Pria
                        <input type="radio" name="jenis_kelamin" value="Wanita" <?php echo (isset($_GET['jenis_kelamin']) && $_GET['jenis_kelamin'] == 'Wanita') ? 'checked' : ''; ?>>Wanita
                    </td>
                </tr>
                <tr>
                <tr>
                    <td width="25%">Kelas</td>
                    <td width="5%">:</td>
                    <td width="65%">
                        <select name="kelas">
                            <option value="">-- Pilih Kelas --</option>
                            <option value="X" <?php echo (isset($_GET['kelas']) && $_GET['kelas'] == 'X') ? 'selected' : ''; ?>>X</option>
                            <option value="XI" <?php echo (isset($_GET['kelas']) && $_GET['kelas'] == 'XI') ? 'selected' : ''; ?>>XI</option>
                            <option value="XII" <?php echo (isset($_GET['kelas']) && $_GET['kelas'] == 'XII') ? 'selected' : ''; ?>>XII</option>
                        </select>
                    </td>
                </tr>
            </table>
            <input type="submit" name="<?php echo isset($_GET['id_siswa']) ? 'update_siswa' : 'submit' ?>" value="<?php echo isset($_GET['id_siswa']) ? 'Update' : 'Send';  ?>">
        </form>

        <!-- Insert Data Siswa -->
        <?php
        error_reporting(E_ALL ^ E_NOTICE);

        if (isset($_POST['submit_siswa'])) {
            $id_siswa = $_POST['id_siswa'];
            $nama_siswa = $_POST['nama_siswa'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $kelas = $_POST['kelas'];

            if ($nama_siswa == "" || $jenis_kelamin == "" || $kelas == "") {
                echo "<script>alert('Data tidak boleh kosong')</script>";
            } else {
                $query_insert = "INSERT INTO siswa (nama_siswa, jenis_kelamin, kelas) VALUES ('$nama_siswa','$jenis_kelamin','$kelas')";
                mysqli_query($conn, $query_insert);
                echo "<script>alert('insert Data is Succesfully')</script>";
            }
        }
        ?>
        <hr>
        <!-- Form Pendaftaran -->
        <h3>Form Pendaftaran</h3>
        <form action="form.php" method="post">
            <table border="0" width="30%">
                <tr>
                    <td width="25%">ID Pendaftaran</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="id_pendaftaran" size="10" value="<?php echo isset($_GET['id_pendaftaran']) ? $_GET['id_pendaftaran'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td width="25%">ID siswa</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="id_siswa" size="10" value="<?php echo isset($_GET['id_siswa']) ? $_GET['id_siswa'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td width="25%">Ekskul</td>
                    <td width="5%">:</td>
                    <td width="65%">
                        <select name="ekskul">
                            <option value="">-- Pilih Ekskul --</option>
                            <option value="Pramuka" <?php echo (isset($_GET['ekskul']) && $_GET['ekskul'] == 'Pramuka') ? 'selected' : ''; ?>>Pramuka</option>
                            <option value="Band" <?php echo (isset($_GET['ekskul']) && $_GET['ekskul'] == 'Band') ? 'selected' : ''; ?>>Band</option>
                            <option value="Vocal" <?php echo (isset($_GET['ekskul']) && $_GET['ekskul'] == 'Vocal') ? 'selected' : ''; ?>>Vocal</option>
                        </select>
                    </td>
                </tr>
            </table>
            <input type="submit" name="<?php echo isset($_GET['id_pendaftaran']) ? 'update_pendaftaran' : 'submit' ?>" value="<?php echo isset($_GET['id_pendaftaran']) ? 'Update' : 'Send';  ?>" value="Simpan">
        </form>
        <?php
        if (isset($_POST['submit_pendaftaran'])) {
            $id_pendaftaran = $_POST['id_pendaftaran'];
            $id_siswa = $_POST['id_siswa'];
            $ekskul = $_POST['ekskul'];

            // Validasi input
            if ($id_siswa == "" || $ekskul == "") {
                echo "<script>alert('Data Pendaftaran Tidak boleh kosong')</script>";
            } else {
                $query_insert_pendaftaran = "INSERT INTO pendaftaran (id_siswa, ekskul) VALUES ('$id_siswa','$ekskul')";
                mysqli_query($conn, $query_insert_pendaftaran);
                echo "<script>alert('insert Data is Succesfully')</script>";
            }
        }
        ?>

    </center>
</body>

</html>