<?php
include "../../database/koneksi.php";

if (isset($_GET['idpesanan'])) {
    $idpesanan = $_GET['idpesanan'];

    $query = "SELECT * FROM pesanan WHERE idpesanan = '$idpesanan'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $queryPembayaran = "SELECT total FROM pembayaran WHERE idpesanan = '$idpesanan'";
        $resultPembayaran = mysqli_query($koneksi, $queryPembayaran);
        $insertLaporan = "INSERT INTO laporan 
            (waktu, idpesanan, nama, layanan, ukuran, jumlah, bahan, finishing, catatan, file, status_pesanan, keterangan)
            VALUES (
                '{$data['waktu']}',
                '{$data['idpesanan']}',
                '{$data['nama']}',
                '{$data['layanan']}',
                '{$data['ukuran']}',
                '{$data['jumlah']}',
                '{$data['bahan']}',
                '{$data['finishing']}',
                '{$data['catatan']}',
                '{$data['file']}',
                '{$data['status_pesanan']}',
                'Pesanan Dihapus'
            )";
        if (mysqli_query($koneksi, $insertLaporan)) {
            // Hapus dari tabel pesanan
            $delete = "DELETE FROM pesanan WHERE idpesanan = '$idpesanan'";
            if (mysqli_query($koneksi, $delete)) {
              echo "<script>
                    alert('Pesanan berhasil dihapus dan dicatat di laporan.');
                    window.location.href = 'dashboard.php?page=pesanan';
                </script>";
                exit;
            } else {
                echo "Gagal menghapus pesanan.";
            }
        } else {
            echo "Gagal mencatat ke laporan.";
        }
    } else {
        echo "Data pesanan tidak ditemukan.";
    }
} else {
    echo "ID pesanan tidak diberikan.";
}
?>