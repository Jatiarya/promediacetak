<?php
include '../../database/koneksi.php'; // sesuaikan path-nya

$dari = $_GET['dari'] ?? '';
$sampai = $_GET['sampai'] ?? '';

$query = "SELECT waktu, layanan, jumlah, total FROM laporan";
if (!empty($dari) && !empty($sampai)) {
    $query .= " WHERE waktu BETWEEN '$dari' AND '$sampai'";
}
$query .= " ORDER BY waktu DESC";

$result = mysqli_query($koneksi, $query);

$data = [];
while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>