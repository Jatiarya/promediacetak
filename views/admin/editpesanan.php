<title>Edit Pesanan</title>
<div class="max-w-6xl mx-auto mt-5">
    <header class="mb-6">
        <h1 class="text-3xl font-bold text-primary">
            Edit Pesanan
        </h1>
    </header>

    <div id="alertSuccess" class="hidden fixed p-4 rounded bg-green-100 text-green-800 border border-green-300">
        Status pembayaran berhasil diperbarui.
    </div>

    <?php
        include "../../database/koneksi.php";
        if(isset($_GET['idpesanan'])) {
        $idpesanan=$_GET['idpesanan'];
        $query = "SELECT  * FROM pesanan where idpesanan = '$idpesanan'";
        $result = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_array($result);
}
        //update data
        if(isset($_POST['status_pesanan'])) {
            $status_pesanan = $_POST['status_pesanan'];
            $idpesanan = $_POST['idpesanan'];
            $queryUpdate = "UPDATE pesanan SET status_pesanan = '$status_pesanan' WHERE idpesanan = '$idpesanan'";
            if(mysqli_query($koneksi, $queryUpdate)) {
                echo '<div class="p-4 rounded bg-green-100 text-green-800 border border-green-300">
        Status pembayaran berhasil diperbarui. <a href="dashboard.php?page=pembayaran"></a>
    </div>';
            } else {
                echo "<script>alert('Gagal memperbarui status pembayaran.');</script>";
            }
        }

    ?>

    <form class="bg-white p-6 rounded-xl shadow space-y-4 mt-5" method="POST" action="" enctype="multipart/form-data">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Waktu Pemesanan</label>
                <input type="text" name="waktu" value="<?php echo $data['waktu']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">ID Pesanan</label>
                <input type="text" name="idpesanan" value="<?php echo $data['idpesanan']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Pemesan</label>
                <input type="text" name="nama" value="<?php echo $data['nama']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No HP</label>
                <input type="text" name="nohp" value="<?php echo $data['nohp']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">No HP</label>
                <input type="text" name="layanan" value="<?php echo $data['layanan']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Ukuran</label>
                <input type="text" name="ukuran" value="<?php echo $data['ukuran']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="text" name="jumlah" value="<?php echo $data['jumlah']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Bahan</label>
                <input type="text" name="bahan" value="<?php echo $data['bahan']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Finishing</label>
                <input type="text" name="finishing" value="<?php echo $data['finishing']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Catatan</label>
                <textarea name="catatan" value="" id="" class="p-3 mt-1 block
                w-full rounded-md border-gray-300 shadow-sm" readonly><?php echo $data['catatan']; ?></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">File</label>
                <div class="p-3 mt-2">
                    <a href="../../uploads/<?php echo $data['file']; ?>" target="_blank"
                        class="text-blue-600 underline">
                        <?php echo $data['file']; ?>
                    </a>
                </div>

            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Status Pesanan</label>
                <select name="status_pesanan" class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="Menuggu" <?php echo $data['status_pesanan'] == "Menuggu" ? "selected" : ""; ?>>
                        Menuggu</option>
                    <option value="Diproses" <?php echo $data['status_pesanan'] == "Diproses" ? "selected" : ""; ?>>
                        Diproses
                    </option>
                    <option value="Dibatalkan" <?php echo $data['status_pesanan'] == "Dibatalkan" ? "selected" : ""; ?>>
                        Dibatalkan
                    </option>
                    <option value="Selesai" <?php echo $data['status_pesanan'] == "Selesai" ? "selected" : ""; ?>>
                        Selesai
                    </option>
                </select>
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-[#005EFF] text-white px-4 py-2 rounded hover:bg-blue-700">Simpan
                Perubahan</button>
            <a href="?page=pesanan" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-black">Kembali</a>
        </div>
    </form>
</div>