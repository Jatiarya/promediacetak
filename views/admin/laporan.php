<title>Laporan</title>

<body class="bg-gray-100 font-sans">
    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h1 class="text-3xl font-bold text-primary mb-6">Laporan</h1>

        <!-- Filter Laporan -->
        <div class="sticky top-[80px] bg-white p-4 rounded-xl shadow mb-6">
            <form id="filterForm" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Dari Tanggal</label>
                    <input type="date" name="start_date" id="startDate"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Sampai Tanggal</label>
                    <input type="date" name="end_date" id="endDate"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>
                <div class="flex gap-2 items-end">
                    <button type="submit" name="filter"
                        class="filter-laporan text-white px-4 py-2 rounded bg-blue-700 hover:bg-blue-900 cursor-pointer">
                        <i class="fa-solid fa-filter"></i> Filter
                    </button>
                    <button type="button" onclick="downloadLaporan()"
                        class="text-white px-4 py-2 rounded bg-orange-600 hover:bg-orange-900 cursor-pointer">
                        <i class="fa-solid fa-download"></i> Unduh
                    </button>
                </div>
            </form>

        </div>

        <!-- Tabel Laporan -->
        <div class="bg-white rounded-xl shadow overflow-x-auto">
            <table id="laporanTable" class="min-w-full text-sm text-gray-800">
                <thead class="bg-[#005EFF] text-white text-left text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Layanan</th>
                        <th class="px-4 py-3">Jumlah</th>
                        <th class="px-4 py-3">Pendapatan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php 
include "../../database/koneksi.php";

$start_date = $_POST['start_date'] ?? null;
$end_date = $_POST['end_date'] ?? null;

if ($start_date && $end_date) {
    $tampil = "SELECT * FROM laporan WHERE TIMESTAMP(waktu) BETWEEN '$start_date' AND '$end_date'";
} else {
    $tampil = "SELECT * FROM laporan";
}

$query = mysqli_query($koneksi, $tampil);
$totalPendapatan = 0;

while($data = mysqli_fetch_array($query)) {
    $totalPendapatan += $data['total'];
?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3"><?php echo $data['waktu']; ?></td>
                        <td class="px-4 py-3"><?php echo $data['layanan']; ?></td>
                        <td class="px-4 py-3"><?php echo $data['jumlah']; ?></td>
                        <td class="px-4 py-3"><?php echo number_format($data['total'], 0, ',', '.'); ?></td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

        <!-- Ringkasan -->
        <div id="summaryBox" class="mt-6 bg-white p-4 rounded-xl shadow text-right">
            <p class="text-lg font-semibold text-gray-700">
                Total Pendapatan:
                <span id="totalPendapatan" class="text-primary">Rp 0</span>
            </p>
        </div>
    </main>
    </div>
    <script>
    document.getElementById('totalPendapatan').textContent = "Rp <?= number_format($totalPendapatan, 0, ',', '.') ?>";
    </script>
    <script>
    function downloadLaporan() {
        const start = document.getElementById('startDate').value;
        const end = document.getElementById('endDate').value;

        if (!start || !end) {
            alert("Pilih rentang tanggal terlebih dahulu!");
            return;
        }

        // Redirect ke file export dengan parameter tanggal
        window.location.href = `export_laporan.php?start_date=${start}&end_date=${end}`;
    }
    </script>