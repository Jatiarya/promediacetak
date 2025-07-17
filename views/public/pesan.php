<?php
if (isset($_POST['kirim'])) {
    include "../../database/koneksi.php";
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $layanan = $_POST['layanan'];
    $ukuran = $_POST['ukuran'];
    $jumlah = $_POST['jumlah'];
    $bahan = $_POST['bahan'];
    $finishing = $_POST['finishing'] ?? '';
    $catatan = $_POST['catatan'];
    $file = $_FILES['file']['name'];
    $tmp_file = $_FILES['file']['tmp_name'];
    $buktibayar = $_FILES['buktibayar']['name'];
    $tmp_bukti = $_FILES['buktibayar']['tmp_name'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

    // Upload file
    move_uploaded_file($tmp_file, "../../uploads/$file");
    move_uploaded_file($tmp_bukti, "../../img/$buktibayar");

    // Insert ke tabel pesanan
    $queryPesanan = "INSERT INTO pesanan (nama, nohp, layanan, ukuran, jumlah, bahan, finishing, catatan, file) 
                     VALUES ('$nama', '$nohp', '$layanan', '$ukuran', '$jumlah', '$bahan', '$finishing', '$catatan', '$file')";
    $resultPesanan = mysqli_query($koneksi, $queryPesanan);

    if ($resultPesanan) {
        $idpesanan = mysqli_insert_id($koneksi); 
$layananHarga = [
    "Cetak Kartu Nama" => 500,
    "Cetak Brosur" => 1500,
    "Cetak Poster" => 1000,
    "Cetak Banner" => 2000,
    "Cetak Makalah" => 1000,
    "Cetak Skripsi" => 1500,
    "Cetak Proposal" => 1200
];

$ukuranHarga = [
    "A6" => 0,
    "A5" => 200,
    "A4" => 400,
    "A3" => 600,
    "custom" => 1000
];

$bahanHarga = [
    "HVS" => 0,
    "Art Paper" => 500,
    "Karton" => 700
];

$finishingHarga = [
    "Glossy" => 1500,
    "Doff" => 2000,
    "Jilid" => 5000
];

// Hitung
$hargaPerItem = $layananHarga[$layanan] + $ukuranHarga[$ukuran] + $bahanHarga[$bahan];
$finishingTotal = 0;

// Jika ada lebih dari satu finishing
if (is_array($_POST['finishing'])) {
    foreach ($_POST['finishing'] as $f) {
        $finishingTotal += $finishingHarga[$f] ?? 0;
    }
    $finishing = implode(", ", $_POST['finishing']); 
} else {
    $finishingTotal += $finishingHarga[$finishing] ?? 0;
}

$totalHarga = ($hargaPerItem + $finishingTotal) * intval($jumlah);

// Simpan ke database
$queryBayar = "INSERT INTO pembayaran (idpesanan, metode_pembayaran, buktibayar, total) 
               VALUES ( '$idpesanan', '$metode_pembayaran', '$buktibayar', '$totalHarga')";
        $resultBayar = mysqli_query($koneksi, $queryBayar);
        if ($resultBayar) {
            echo "<script>alert('Pesanan dan pembayaran berhasil dikirim!');window.location.href='beranda.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan pembayaran.');</script>";
        }
    } else {
        echo "<script>alert('Gagal mengirim pesanan.');</script>";
    }
    $formatted = "Rp " . number_format($totalHarga, 0, ',', '.');
}
?>

<title>Pesan</title>

<body class="text-white py-10">
    <div class="mt-10 max-w-4xl mx-auto bg-[#005EFF] p-8 rounded-xl shadow-md text-white">
        <h2 class="text-2xl font-bold mb-6 text-center text-white">
            Form Pemesanan Jasa Cetak
        </h2>

        <form method="POST" enctype="multipart/form-data" class="space-y-6" class="">
            <!-- Informasi User -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Nama</label>
                    <input type="text" id="nama" name="nama" class="w-full bg-white text-black px-3 py-2 rounded"
                        required />
                </div>
                <div>
                    <label class="block font-medium mb-1">No. HP (WhatsApp)</label>
                    <input type="tel" id="nohp" name="nohp" class="w-full bg-white text-black px-3 py-2 rounded"
                        required />
                </div>
            </div>

            <!-- Pilihan Layanan -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Jenis Layanan</label>
                    <select id="layanan" name="layanan" class="w-full bg-white text-black px-3 py-2 rounded" required>
                        <option value="">-- Pilih --</option>
                        <option value="Cetak Kartu Nama">Cetak Kartu Nama</option>
                        <option value="Cetak Brosur">Cetak Brosur</option>
                        <option value="Cetak Poster">Cetak Poster</option>
                        <option value="Cetak Banner">Cetak Banner</option>
                        <option value="Cetak Makalah">Cetak Makalah</option>
                        <option value="Cetak Skripsi">Cetak Skripsi</option>
                        <option value="Cetak Proposal">Cetak Proposal</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium mb-1">Ukuran</label>
                    <select id="ukuran" name="ukuran" class="w-full bg-white text-black px-3 py-2 rounded" required>
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
                    <input type="number" id="jumlah" name="jumlah" min="0" value="0"
                        class="w-full bg-white text-black px-3 py-2 rounded" required />
                </div>
                <div>
                    <label class="block font-medium mb-1">Bahan</label>
                    <select id="bahan" name="bahan" class="w-full bg-white text-black px-3 py-2 rounded" required>
                        <option value="HVS">HVS</option>
                        <option value="Art Paper">Art Paper</option>
                        <option value="Karton">Karton</option>

                    </select>
                </div>
            </div>

            <!-- Finishing -->
            <div>
                <label class="block font-medium mb-1">Finishing</label>
                <div class="flex flex-col gap-2">
                    <label><input type="checkbox" name="finishing" class="finishing mr-2" value="Glossy" />
                        Laminating Glossy (+Rp1500)</label>
                    <label><input type="checkbox" name="finishing" class="finishing mr-2" value="Doff" />
                        Laminating Doff (+Rp2000)</label>
                    <label><input type="checkbox" name="finishing" class="finishing mr-2" value="Jilid" />
                        Jilid(+Rp5000)</label>
                </div>
            </div>
            <div>
                <label class="block font-medium mb-1">Catatan Tambahan</label>
                <textarea id="catatan" name="catatan" rows="3" class="w-full bg-white text-black px-3 py-2 rounded"
                    placeholder="Tulis instruksi tambahan (jika ada)..."></textarea>
            </div>
            <div>
                <label class="block font-medium mb-1">Upload File Desain (PDF/JPG/PNG)</label>
                <input type="file" name="file" class="w-full bg-white text-black rounded px-3 py-2"
                    accept=".pdf,.jpg,.jpeg,.png" />
            </div>
            <div class="p-4 bg-white text-black rounded-md">
                <p class="font-semibold text-lg">
                    Estimasi Total Pembayaran:
                    <span id="totalHarga" name="total" class="text-blue-600">Rp0</span>
                </p>
            </div>
            <div class="p-4 display-paymentmethode bg-white text-black rounded-md">
                <div class="title">
                    <h1 class="font-bold text-[20px]">Metode Pembayaran :</h1>
                </div>
                <div class="opsi grid grid-cols-2">
                    <div class="transfer-bank flex flex-col gap-2">
                        <h1 class="font-medium">Transfer Bank :</h1>
                        <div class="bank flex gap-1 items-center font-medium">
                            <img src="../../source/mandiri.svg" alt="">
                            <h2>Mandiri - 1610012626364 (Pro Media Cetak)</h2>
                        </div>
                        <div class="bank flex gap-1 items-center font-medium">
                            <img src="../../source/bri.svg" alt="">
                            <h2>BRI - 4357-2462-427 (Pro Media Cetak)</h2>
                        </div>
                    </div>
                    <div class="e-wallet flex flex-col gap-2">
                        <h1 class="font-medium">E - Wallet :</h1>
                        <div class="wallet flex gap-1 items-center font-medium">
                            <img src="../../source/dana.svg" alt="">
                            <h2>DANA - 081973377504 (Pro Media Cetak)</h2>
                        </div>
                        <div class="wallet flex gap-1 items-center font-medium">
                            <img src="../../source/gopay.svg" alt="">
                            <h2>GoPay - 081973377504 (Pro Media Cetak)</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <label class="block font-medium mb-1">Metode Pembayaran</label>
                <select id="metode_pembayaran" name="metode_pembayaran"
                    class="w-full bg-white text-black px-3 py-2 rounded" required>
                    <option value="">-- Pilih --</option>
                    <option value="Transfer Bank">Transfer bank</option>
                    <option value="GOPAY">GoPay</option>
                    <option value="DANA">DANA</option>
                    <option value="QRIS">QRIS</option>
                </select>
            </div>

            <div>
                <label class="block font-medium mb-1">Upload Bukti Pembayaran</label>
                <input type="file" name="buktibayar" class="w-full bg-white text-black rounded px-3 py-2"
                    accept=".jpg,.jpeg,.png" required />
            </div>
            <div class="text-right">
                <button type="submit" name="kirim"
                    class="cursor-pointer bg-[#FFA500] hover:bg-blue-700 text-white px-6 py-2 rounded">
                    Kirim Pesanan
                </button>
            </div>
        </form>
    </div>
    <script>
    const layananHarga = {
        "Cetak Kartu Nama": 500,
        "Cetak Brosur": 1500,
        "Cetak Poster": 1000,
        "Cetak Banner": 2000,
        "Cetak Makalah": 1000,
        "Cetak Skripsi": 1500,
        "Cetak Proposal": 1200
    };

    const ukuranHarga = {
        "A6": 500,
        "A5": 200,
        "A4": 400,
        "A3": 600,
        "custom": 1000
    };

    const bahanHarga = {
        "HVS": 800,
        "Art Paper": 500,
        "Karton": 700
    };

    const finishingHarga = {
        "Glossy": 1500,
        "Doff": 2000,
        "Jilid": 5000
    };

    function hitungTotalHarga() {
        const layanan = document.getElementById("layanan").value;
        const ukuran = document.getElementById("ukuran").value;
        const jumlah = parseInt(document.getElementById("jumlah").value) || 0;
        const bahan = document.getElementById("bahan").value;
        const finishingInputs = document.querySelectorAll("input.finishing:checked");

        let finishingTotal = 0;
        finishingInputs.forEach(input => {
            finishingTotal += finishingHarga[input.value] || 0;
        });

        let total = (layananHarga[layanan] || 0) +
            (ukuranHarga[ukuran] || 0) +
            (bahanHarga[bahan] || 0) +
            finishingTotal;

        let totalAll = total * jumlah;
        document.getElementById("totalHarga").innerText = "Rp" + totalAll.toLocaleString("id-ID");
    }

    // Event listener
    document.querySelectorAll("#layanan, #ukuran, #jumlah, #bahan, .finishing").forEach(element => {
        element.addEventListener("change", hitungTotalHarga);
    });
    </script>

</body>