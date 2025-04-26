<?php include 'koneksi.php'; 

if(isset($_POST['delete_perpus'])){
    $id_perpus = $_POST['id_perpus'];
    $delete_query_perpus = "DELETE FROM perpus WHERE id_perpus='$id_perpus'";
    mysqli_query($conn, $delete_query_perpus);
    header("Location: view.php");
}

if(isset($_POST['delete_buku'])){
    $id_buku = $_POST['id_buku'];
    $delete_query_buku = "DELETE FROM buku WHERE id_buku='$id_buku'";
    mysqli_query($conn, $delete_query_buku);
    header("Location: view.php");
}
?>
