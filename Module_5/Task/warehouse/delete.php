<?php
$conn = mysqli_connect("localhost", "root", "", "warehouse");

if (isset($_POST['delete_gudang'])) {
    $kode_gudang = $_POST['kode_gudang'];
    $delete_query_gudang = "DELETE FROM gudang WHERE kode_gudang='$kode_gudang'";
    mysqli_query($conn, $delete_query_gudang);
    header("Location: warehouse.php");
}

if (isset($_POST['delete_barang'])) {
    $kode_barang = $_POST['kode_barang'];
    $delete_query_barang = "DELETE FROM barang WHERE kode_barang='$kode_barang'";
    mysqli_query($conn, $delete_query_barang);
    header("Location: warehouse.php");
}
?>