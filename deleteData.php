<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    $id_transaksi = $_GET['deleteid'];

    $sql = "DELETE FROM transaksi where id_transaksi=$id_transaksi";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Deleted Successfull";
        header('location:dataTransaksi.php');
    } else {
        die(mysqli_error($conn));
    }
}
