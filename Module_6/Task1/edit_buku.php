<?php
$conn = mysqli_connect("localhost","root","","db_library");

$kode_buku = $_GET['kode_buku'];
$query = "SELECT * FROM buku WHERE kode_buku='$kode_buku'";
$data = mysqli_fetch_assoc(mysqli_query($conn, $query));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_buku = $_POST['nama_buku'];
    $kode_jenis = $_POST['kode_jenis'];

    $update = "UPDATE buku SET nama_buku='$nama_buku', kode_jenis='$kode_jenis' WHERE kode_buku='$kode_buku'";
    mysqli_query($conn, $update);

    echo "<script>alert('Book updated!'); window.location='form.php';</script>";
}
?>

<form action="" method="post">
    <label>Book Name:</label>
    <input type="text" name="nama_buku" value="<?= $data['nama_buku'] ?>" required><br>

    <label>Book Type:</label>
    <select name="kode_jenis">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM jenis_buku");
        while ($row = mysqli_fetch_assoc($result)) {
            $selected = ($row['kode_jenis'] == $data['kode_jenis']) ? "selected" : "";
            echo "<option value='{$row['kode_jenis']}' $selected>{$row['nama_jenis']}</option>";
        }
        ?>
    </select><br>

    <button type="submit">Update</button>
</form>
