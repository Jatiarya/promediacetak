<?php
include "../../database/koneksi.php";

$start = $_GET['start_date'];
$end = $_GET['end_date'];

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=laporan.csv");

$output = fopen("php://output", "w");
fputcsv($output, ['Tanggal', 'Layanan', 'Jumlah', 'Pendapatan']);

$query = mysqli_query($koneksi, "SELECT * FROM laporan WHERE TIMESTAMP(waktu) BETWEEN '$start' AND '$end'");
while($row = mysqli_fetch_assoc($query)) {
    fputcsv($output, [$row['waktu'], $row['layanan'], $row['jumlah'], $row['total']]);
}

fclose($output);
?>