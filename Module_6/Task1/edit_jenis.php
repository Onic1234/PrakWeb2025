<?php

$conn = mysqli_connect("localhost","root","","db_library");

// Ambil kode_jenis dari URL
$kode_jenis = $_GET['kode_jenis'];

// Ambil data jenis buku berdasarkan kode_jenis
$query = "SELECT * FROM jenis_buku WHERE kode_jenis='$kode_jenis'";
$data = mysqli_fetch_assoc(mysqli_query($conn, $query));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_jenis = $_POST['nama_jenis'];
    $keterangan_jenis = $_POST['keterangan_jenis'];

    // Query update data
    $update = "UPDATE jenis_buku SET nama_jenis='$nama_jenis', keterangan_jenis='$keterangan_jenis' WHERE kode_jenis='$kode_jenis'";
    mysqli_query($conn, $update);

    echo "<script>alert('Book type updated successfully!'); window.location='form.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book Type</title>
</head>
<body>
    <h2>Edit Book Type</h2>
    
    <form action="" method="post">
        <label>Type Code (Read Only):</label>
        <input type="text" name="kode_jenis" value="<?= $data['kode_jenis'] ?>" readonly><br>

        <label>Type Name:</label>
        <input type="text" name="nama_jenis" value="<?= $data['nama_jenis'] ?>" required><br>

        <label>Description:</label>
        <input type="text" name="keterangan_jenis" value="<?= $data['keterangan_jenis'] ?>" required><br>

        <button type="submit">Update</button>
    </form>

    <br>
</body>
</html>
