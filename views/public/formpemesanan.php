<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemesanan Jasa Cetak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 py-10">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">
            Form Pemesanan Jasa Cetak
        </h2>

        <form id="orderForm" class="space-y-6">
            <!-- Informasi User -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Nama</label>
                    <input type="text" id="nama" class="w-full border px-3 py-2 rounded" required />
                </div>
                <div>
                    <label class="block font-medium mb-1">No. HP (WhatsApp)</label>
                    <input type="tel" id="nohp" class="w-full border px-3 py-2 rounded" required />
                </div>
            </div>

            <!-- Pilihan Layanan -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Jenis Layanan</label>
                    <select id="layanan" class="w-full border px-3 py-2 rounded" required>
                        <option value="">-- Pilih --</option>
                        <option value="kartu_nama">Cetak Kartu Nama</option>
                        <option value="brosur">Cetak Brosur</option>
                        <option value="poster">Cetak Poster</option>
                        <option value="banner">Cetak Banner</option>
                        <option value="makalah">Cetak Makalah</option>
                        <option value="makalah">Cetak Skripsi</option>
                        <option value="makalah">Cetak Proposal</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium mb-1">Ukuran</label>
                    <select id="ukuran" class="w-full border px-3 py-2 rounded" required>
                        <option value="A6">A6</option>
                        <option value="A5">A5</option>
                        <option value="A4">A4</option>
                        <option value="A3">A3</option>
                        <option value="custom">Custom</option>
                    </select>
                </div>
            </div>

            <!-- Jumlah dan Bahan -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Jumlah Pesanan</label>
                    <input type="number" id="jumlah" min="1" value="1" class="w-full border px-3 py-2 rounded"
                        required />
                </div>
                <div>
                    <label class="block font-medium mb-1">Bahan</label>
                    <select id="bahan" class="w-full border px-3 py-2 rounded" required>
                        <option value="hvs">HVS</option>
                        <option value="artpaper">Art Paper</option>
                        <option value="karton">Karton</option>
                        <option value="vinyl">Vinyl</option>
                    </select>
                </div>
            </div>

            <!-- Finishing -->
            <div>
                <label class="block font-medium mb-1">Finishing</label>
                <div class="flex flex-col gap-2">
                    <label><input type="checkbox" class="finishing mr-2" value="glossy" />
                        Laminating Glossy (+Rp1500)</label>
                    <label><input type="checkbox" class="finishing mr-2" value="doff" />
                        Laminating Doff (+Rp2000)</label>
                    <label><input type="checkbox" class="finishing mr-2" value="spiral" />
                        Jilid(+Rp5000)</label>
                </div>
            </div>
            <div>
                <label class="block font-medium mb-1">Catatan Tambahan</label>
                <textarea id="catatan" rows="3" class="w-full border px-3 py-2 rounded"
                    placeholder="Tulis instruksi tambahan (jika ada)..."></textarea>
            </div>

            <!-- Upload File -->
            <div>
                <label class="block font-medium mb-1">Upload File Desain (PDF/JPG/PNG)</label>
                <input type="file" class="w-full border rounded px-3 py-2" accept=".pdf,.jpg,.jpeg,.png" />
            </div>

            <!-- Estimasi Total -->
            <div class="bg-gray-50 p-4 border rounded-md">
                <p class="font-semibold text-lg">
                    Estimasi Total Pembayaran:
                    <span id="totalHarga" class="text-blue-600">Rp0</span>
                </p>
            </div>

            <!-- Metode Pembayaran -->
            <div>
                <label class="block font-medium mb-1">Metode Pembayaran</label>
                <select id="metode_pembayaran" class="w-full border px-3 py-2 rounded" required>
                    <option value="">-- Pilih --</option>
                    <option value="bca">Transfer bank</option>
                    <option value="gopay">GoPay</option>
                    <option value="dana">DANA</option>
                    <option value="dana">QRIS</option>
                </select>
            </div>

            <!-- Bukti Pembayaran -->
            <div>
                <label class="block font-medium mb-1">Upload Bukti Pembayaran</label>
                <input type="file" class="w-full border rounded px-3 py-2" accept=".jpg,.jpeg,.png" required />
            </div>

            <!-- Submit -->
            <div class="text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                    Kirim Pesanan
                </button>
            </div>
        </form>
    </div>

    <script>
    const layananHarga = {
        kartu_nama: 1000,
        brosur: 5000,
        poster: 50000,
        banner: 150000,
        makalah: 500,
    };

    const finishingHarga = {
        glossy: 1500,
        doff: 2000,
        spiral: 5000,
    };

    const form = document.getElementById("orderForm");
    const layananSelect = document.getElementById("layanan");
    const jumlahInput = document.getElementById("jumlah");
    const finishingCheckboxes = document.querySelectorAll(".finishing");
    const totalHargaSpan = document.getElementById("totalHarga");

    function hitungTotal() {
        const layanan = layananSelect.value;
        const jumlah = parseInt(jumlahInput.value) || 0;

        if (!layanan || jumlah <= 0) {
            totalHargaSpan.textContent = "Rp0";
            return;
        }

        let hargaDasar = layananHarga[layanan] * jumlah;

        let biayaFinishing = 0;
        finishingCheckboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                biayaFinishing += finishingHarga[checkbox.value] * jumlah;
            }
        });

        const total = hargaDasar + biayaFinishing;
        totalHargaSpan.textContent = "Rp" + total.toLocaleString("id-ID");
    }

    layananSelect.addEventListener("change", hitungTotal);
    jumlahInput.addEventListener("input", hitungTotal);
    finishingCheckboxes.forEach((cb) =>
        cb.addEventListener("change", hitungTotal)
    );
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        alert("Pesanan berhasil dikirim! (simulasi)");
    });

    hitungTotal();
    </script>
</body>

</html>