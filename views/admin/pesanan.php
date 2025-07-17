<title>Pesanan</title>
<div class="max-w-7xl mx-auto mt-5 z-0">
    <header class="mb-6">
        <h1 class="text-3xl font-bold text-primary mb-2">Pesanan</h1>
    </header>
    <div class="h-[80px]"></div>
    <div class="overflow-auto rounded-xl shadow ring-1 ring-gray-200">
        <table class="min-w-full text-sm text-gray-800 bg-white">
            <thead class="bg-primary text-white bg-[#005EFF] text-left text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-4 py-3">Waktu</th>
                    <th class="px-4 py-3">ID Pesanan</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Layanan</th>
                    <th class="px-4 py-3">Ukuran</th>
                    <th class="px-4 py-3">Jumlah</th>
                    <th class="px-4 py-3">Bahan</th>
                    <th class="px-4 py-3">Finishing</th>
                    <th class="px-4 py-3">Catatan</th>
                    <th class="px-4 py-3">File</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                <!-- Contoh Data -->
                <?php
                    include "../../database/koneksi.php";
                    $query = "SELECT * FROM pesanan";
                    $result = mysqli_query($koneksi, $query);
                    while($data = mysqli_fetch_assoc($result)) {
                 ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3"><?php echo $data['waktu']; ?></td>
                    <td class="px-4 py-3"><?php echo $data['idpesanan']; ?></td>
                    <td class="px-4 py-3"><?php echo $data['nama']; ?></td>
                    <td class="px-4 py-3"><?php echo $data['layanan'] ;?></td>
                    <td class="px-4 py-3"><?php echo $data['ukuran']; ?></td>
                    <td class="px-4 py-3"><?php echo $data['jumlah'];?></td>
                    <td class="px-4 py-3"><?php echo $data['bahan']; ?></td>
                    <td class="px-4 py-3"><?php echo $data['finishing']; ?></td>
                    <td class="px-4 py-3 text-gray-600"><?php echo $data['catatan']; ?></td>
                    <td class="px-4 py-3">
                        <a href="download.php?file=<?php echo urlencode($data['file']); ?>"
                            class="text-blue-600 underline">
                            Download
                        </a>
                    </td>
                    <td class="flex px-4 py-3">
                        <p class="block py-5 text-blue-500">
                            <?php if( $data['status_pesanan']=="Menunggu") {echo "Menunggu";}?>
                        </p>
                        <p class="block py-5 text-blue-500">
                            <?php if( $data['status_pesanan']=="Diproses") {echo "Diproses";}?>
                        </p>
                        <p class="block py-5 text-green-500">
                            <?php if( $data['status_pesanan']=="Selesai") {echo "Selesai";}?>
                        </p>
                        <p class="block py-5 text-red-500">
                            <?php if( $data['status_pesanan']=="Dibatalkan") {echo "Dibatalkan";}?>
                        </p>
                    </td>
                    <td class="">
                        <a href="?page=editpesanan&idpesanan=<?php echo $data['idpesanan'];?>"
                            class="btn-hapus text-white px-3 py-1 rounded bg-blue-500 hover:bg-blue-900 text-xs font-bold cursor-pointer">
                            <i class="fa fa-pen"></i>
                        </a>
                        <a href="hapus.php?idpesanan=<?php echo $data['idpesanan'];?>"
                            class="btn-hapus text-white px-3 py-1 rounded bg-orange-500 hover:bg-orange-900 text-xs font-bold cursor-pointer">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    ?>

                <!-- Tambahkan baris data dinamis lainnya di sini -->
            </tbody>
        </table>
        </form>
    </div>
</div>
</div>
</div>
<script>
document.querySelectorAll('.status-pesanan-dropdown').forEach(dropdown => {
    dropdown.addEventListener('change', function() {
        const idPesanan = this.dataset.id;
        const statusBaru = this.value;

        fetch('update_status_pesanan.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `idpesanan=${idPesanan}&status_pesanan=${statusBaru}`
            })
            .then(response => response.text())
            .then(data => {
                console.log('Status pesanan diperbarui:', data);
                const alertBox = document.getElementById('alertSuccess');
                alertBox.classList.remove('hidden');
                setTimeout(() => {
                    alertBox.classList.add('hidden');
                }, 3500);
            })
            .catch(error => {
                console.error('Gagal memperbarui status pesanan:', error);
            });
    });

});
</script>