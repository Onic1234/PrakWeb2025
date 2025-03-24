<?php
$conn = mysqli_connect("localhost","root","","db_library");

// Periksa apakah parameter kode_buku atau kode_jenis tersedia
if (isset($_GET['kode_buku'])) {
    $kode_buku = $_GET['kode_buku'];
    mysqli_query($conn, "DELETE FROM buku WHERE kode_buku='$kode_buku'");
    echo "<script>alert('Book deleted!'); window.location='form.php';</script>";
} elseif (isset($_GET['kode_jenis'])) {
    $kode_jenis = $_GET['kode_jenis'];

    // Hapus semua buku yang memiliki kode_jenis yang akan dihapus
    mysqli_query($conn, "DELETE FROM buku WHERE kode_jenis='$kode_jenis'");

    // Hapus jenis buku
    mysqli_query($conn, "DELETE FROM jenis_buku WHERE kode_jenis='$kode_jenis'");

    echo "<script>alert('Book type deleted!'); window.location='form.php';</script>";
} else {
    echo "<script>alert('Invalid request!'); window.location='form.php';</script>";
}
?>
