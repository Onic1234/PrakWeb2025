<?php
include 'koneksi.php';

if (isset($_POST['delete_siswa'])) {
    $id_siswa = $_POST['id_siswa'];

    // Delete related records in the pendaftaran table
    $query_pendaftaran = "DELETE FROM pendaftaran WHERE id_siswa = '$id_siswa'";
    mysqli_query($conn, $query_pendaftaran);

    // Delete the siswa record
    $query_siswa = "DELETE FROM siswa WHERE id_siswa = '$id_siswa'";
    if (mysqli_query($conn, $query_siswa)) {
        echo "Data siswa berhasil dihapus.";
    } else {
        echo "Gagal menghapus data siswa: " . mysqli_error($conn);
    }
    echo "<br><a href='lihat.php'>Kembali</a>";
} elseif (isset($_POST['delete_pendaftaran'])) {
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $query = "DELETE FROM pendaftaran WHERE id_pendaftaran = '$id_pendaftaran'";
    if (mysqli_query($conn, $query)) {
        echo "Data pendaftaran berhasil dihapus.";
    } else {
        echo "Gagal menghapus data pendaftaran: " . mysqli_error($conn);
    }
    echo "<br><a href='lihat.php'>Kembali</a>";
}
