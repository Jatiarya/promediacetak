<?php
include '../../database/koneksi.php';
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $query = "DELETE FROM pengguna WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        header("location:dashboard.php?page=pengguna");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak ditemukan.";
}

?>