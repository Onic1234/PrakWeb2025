<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>

<body>
    <center>
        <h3>Update Data</h3>

        <?php
        if (isset($_GET['id_siswa'])) {
            $id_siswa = $_GET['id_siswa'];
            $query = "SELECT * FROM siswa WHERE id_siswa='$id_siswa'";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_assoc($result);
        ?>
            <form action="update.php" method="post">
                <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']; ?>">
                <table>
                    <tr>
                        <td>Nama Siswa</td>
                        <td>:</td>
                        <td><input type="text" name="nama_siswa" value="<?php echo $data['nama_siswa']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="jenis_kelamin" value="Pria" <?php echo ($data['jenis_kelamin'] == 'Pria') ? 'checked' : ''; ?>> Pria
                            <input type="radio" name="jenis_kelamin" value="Wanita" <?php echo ($data['jenis_kelamin'] == 'Wanita') ? 'checked' : ''; ?>> Wanita
                        </td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td>
                            <select name="kelas">
                                <option value="X" <?php echo ($data['kelas'] == 'X') ? 'selected' : '' ?>>X</option>
                                <option value="XI" <?php echo ($data['kelas'] == 'XI') ? 'selected' : '' ?>>XI</option>
                                <option value="XII" <?php echo ($data['kelas'] == 'XII') ? 'selected' : '' ?>>XII</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <input type="submit" name="update_siswa" value="Update">
            </form>
        <?php
        } elseif (isset($_GET['id_pendaftaran'])) {
            $id_pendaftaran = $_GET['id_pendaftaran'];
            $query = "SELECT pendaftaran.id_pendaftaran, siswa.nama_siswa, pendaftaran.ekskul 
                      FROM pendaftaran 
                      JOIN siswa ON pendaftaran.id_siswa = siswa.id_siswa 
                      WHERE id_pendaftaran='$id_pendaftaran'";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_assoc($result);
        ?>
            <form action="update.php" method="post">
                <input type="hidden" name="id_pendaftaran" value="<?php echo $data['id_pendaftaran']; ?>">
                <table>
                    <tr>
                        <td>Nama Siswa</td>
                        <td>:</td>
                        <td><input type="text" name="nama_siswa" value="<?php echo $data['nama_siswa']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Ekskul</td>
                        <td>:</td>
                        <td>
                            <select name="ekskul">
                                <option value="Pramuka" <?php echo ($data['ekskul'] == 'Pramuka') ? 'selected' : ''; ?>>Pramuka</option>
                                <option value="Band" <?php echo ($data['ekskul'] == 'Band') ? 'selected' : ''; ?>>Band</option>
                                <option value="Vocal" <?php echo ($data['ekskul'] == 'Vocal') ? 'selected' : ''; ?>>Vocal</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <input type="submit" name="update_pendaftaran" value="Update">
            </form>
        <?php
        }

        // Proses update siswa
        if (isset($_POST['update_siswa'])) {
            $id_siswa = $_POST['id_siswa'];
            $nama_siswa = $_POST['nama_siswa'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $kelas = $_POST['kelas'];

            $update_query = "UPDATE siswa SET nama_siswa='$nama_siswa', jenis_kelamin='$jenis_kelamin', kelas='$kelas' WHERE id_siswa='$id_siswa'";
            mysqli_query($conn, $update_query);
            echo "<script>alert('Data updated successfully')</script>";
            header("Location: lihat.php");
            exit;
        }

        // Proses update pendaftaran
        if (isset($_POST['update_pendaftaran'])) {
            $id_pendaftaran = $_POST['id_pendaftaran'];
            $ekskul = $_POST['ekskul'];

            $update_query = "UPDATE pendaftaran SET ekskul='$ekskul' WHERE id_pendaftaran='$id_pendaftaran'";
            if (mysqli_query($conn, $update_query)) {
                echo "<script>alert('Data pendaftaran updated successfully');</script>";
            } else {
                echo "<script>alert('Failed to update data pendaftaran');</script>";
            }
            echo "<script>window.location.href='lihat.php';</script>";
            exit;
        }
        ?>

    </center>
</body>

</html>