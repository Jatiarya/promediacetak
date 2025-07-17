 <?php 
    include "../../database/koneksi.php";
    // menampilkan jumlah pesanan yang ada hari ini 
    $pesananHariIni = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pesanan WHERE DATE(waktu) = CURDATE()");
    $dataHariIni = mysqli_fetch_assoc($pesananHariIni);
    $totalHariIni = $dataHariIni['total'];
    // menampilkan jumlah pesanan yang sudah di selesai perhari
    $pesananSelesai = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pesanan WHERE status_pesanan='Selesai'");
    $dataSelesai = mysqli_fetch_assoc($pesananSelesai);
    $totalSelesai = $dataSelesai['total'];
    // menampilkan jumlah pendapatan hari ini
    $pendapatanHariIni = mysqli_query($koneksi, "SELECT SUM(total) as total FROM pembayaran WHERE DATE(waktu) = CURDATE()");
    $dataPendapatan = mysqli_fetch_assoc($pendapatanHariIni);
    $totalPendapatan = $dataPendapatan['total'];    

    // menampilkan jumlah pengguna yang terdaftar
    $pengguna = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pengguna");
    $dataPengguna = mysqli_fetch_assoc($pengguna);
    $totalPengguna = $dataPengguna['total'];

    //fungsi chart
    $jumlah_pesanan = array_fill(7, 16, 0); // Index 7 (jam 07) sampai 22


    $sql = "SELECT HOUR(waktu) AS jam, COUNT(*) AS jumlah 
        FROM pesanan 
        WHERE DATE(waktu) = CURDATE() 
        AND HOUR(waktu) BETWEEN 7 AND 22
        GROUP BY HOUR(waktu)";
    $result = $koneksi->query($sql);

    while ($row = $result->fetch_assoc()) {
    $jumlah_pesanan[(int)$row['jam']] = (int)$row['jumlah'];
    }

    $labels = [];
    $data = [];
        for ($i = 7; $i <= 22; $i++) {
    $labels[] = sprintf("%02d:00", $i);
    $data[] = $jumlah_pesanan[$i];
    }

    echo "<script>
        const labels = " . json_encode($labels) . ";
        const data = " . json_encode($data) . ";
    </script>";
?>

 <title>Dashboard</title>
 <div class="ringkasan grid grid-cols-4 gap-6 items-center ml-10 mt-5">
     <div class="w-[300px] h-[150px]">
         <div class="bg-[#005EFF] text-white rounded-sm p-4 shadow text-center">
             <div class="atas flex justify-between items-center mb-2">
                 <h1 class="text-white font-bold">Pesanan Hari Ini</h1>
                 <div class="bg-white text-[#005EFF] rounded-full p-2">
                     <i class="fa-solid fa-cart-shopping"></i>
                 </div>
             </div>
             <div class="bawah flex text-start">
                 <h2 class="text-[40px] font-bold"><?php echo $totalHariIni ?></h2>
             </div>
         </div>
     </div>
     <div class="w-[300px] h-[150px]">
         <div class="bg-[#005EFF] text-white rounded-sm p-4 shadow text-center">
             <div class="atas flex justify-between items-center mb-2">
                 <h1 class="text-white font-bold">Status Selesai</h1>
                 <div class="bg-white text-[#005EFF] rounded-full p-2">
                     <i class="fa-solid fa-circle-check"></i>
                 </div>
             </div>
             <div class="bawah flex text-start">
                 <h2? class="text-[40px] font-bold"><?php echo $totalSelesai; ?></h2>
             </div>
         </div>
     </div>
     <div class="w-[300px] h-[150px]">
         <div class="bg-[#005EFF] text-white rounded-sm p-4 shadow text-center">
             <div class="atas flex justify-between items-center mb-2">
                 <h1 class="text-white font-bold">Pendapatan</h1>
                 <div class="bg-white text-[#005EFF] rounded-full p-2">
                     <i class="fa-solid fa-sack-dollar"></i>
                 </div>
             </div>
             <div class="bawah flex text-start">
                 <h2 class="text-[40px] font-bold">Rp.<?php echo $totalPendapatan ?></h2>
             </div>
         </div>
     </div>
     <div class="w-[300px] h-[150px]">
         <div class="bg-[#005EFF] text-white rounded-sm p-4 shadow text-center">
             <div class="atas flex justify-between items-center mb-2">
                 <h1 class="text-white font-bold">Pengguna Terdaftar</h1>
                 <div class="bg-white text-[#005EFF] rounded-full p-2">
                     <i class="fa-solid fa-users"></i>
                 </div>
             </div>
             <div class="bawah flex text-start">
                 <h2 class="text-[40px] font-bold"><?php echo $totalPengguna; ?></h2>
             </div>
         </div>
     </div>
 </div>
 <!-- Grafik atau Konten Tambahan -->
 <div class="bg-white p-6 rounded-xl shadow py-10">
     <h2 class="text-xl font-semibold mb-4">Grafik Pesanan</h2>
     <div class="h-[500px] bg-gray-100 flex items-center justify-center text-gray-400 italic">
         <div>
             <canvas id="myChart" class="h-[500px]"></canvas>
         </div>
     </div>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels, // dari PHP
        datasets: [{
            label: 'Pesanan hari ini',
            data: data, // dari PHP
            borderWidth: 2,
            fill: false,
            borderColor: '#005EFF',
            backgroundColor: '#005EFF',
            tension: 0.3
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Jumlah Pesanan'
                }
            }
        }
    }
});
 </script>


 </div>
 </div>