<title>Edit Pembayaran</title>
<div class="max-w-6xl mx-auto mt-5">
    <header class="mb-6">
        <h1 class="text-3xl font-bold text-primary">
            Konfirmasi Pembayaran
        </h1>
    </header>

    <div id="alertSuccess" class="hidden fixed p-4 rounded bg-green-100 text-green-800 border border-green-300">
        Status pembayaran berhasil diperbarui.
    </div>
    <?php
        include "../../database/koneksi.php";
        if(isset($_GET['idpembayaran'])) {
        $idpembayaran=$_GET['idpembayaran'];
        $query = "SELECT  pembayaran.waktu, pesanan.idpesanan, pembayaran.idpembayaran, pesanan.nama, pesanan.nohp, pembayaran.metode_pembayaran, pembayaran.total, pembayaran.buktibayar, pembayaran.status_pembayaran 
                  FROM pesanan 
                  INNER JOIN pembayaran ON pesanan.idpesanan = pembayaran.idpesanan where idpembayaran = '$idpembayaran'";
        $result = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_array($result);
}
        //update data
        if(isset($_POST['status_pembayaran'])) {
            $status_pembayaran = $_POST['status_pembayaran'];
            $idpembayaran = $_POST['idpembayaran'];
            $queryUpdate = "UPDATE pembayaran SET status_pembayaran = '$status_pembayaran' WHERE idpembayaran = '$idpembayaran'";
            if(mysqli_query($koneksi, $queryUpdate)) {
                echo '<div class="p-4 rounded bg-green-100 text-green-800 border border-green-300">
        Status pembayaran berhasil diperbarui. <a href="dashboard.php?page=pembayaran"></a>
    </div>';
            } else {
                echo "<script>alert('Gagal memperbarui status pembayaran.');</script>";
            }
        }
    ?>
    <form class="bg-white p-6 rounded-xl shadow space-y-4" method="POST" action="" enctype="multipart/form-data">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="row mb-3">
                <label for="inputPassword3" class="text-sm font-medium text-gray-700">Waktu</label>
                <div class="col-sm-9">
                    <input type="text" class="p-3 mt-1 w-full rounded-md border-gray-300 shadow-sm" readonly
                        name="waktu" value="<?php echo $data['waktu'];?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="text-sm font-medium text-gray-700">ID Pesanan</label>
                <div class="col-sm-9">
                    <input type="text" class="p-3 mt-1 w-full rounded-md border-gray-300 shadow-sm" readonly
                        name="idpesanan" value="<?php echo $data['idpesanan'];?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="text-sm font-medium text-gray-700">ID Pembayaran</label>
                <div class="col-sm-9">
                    <input type="text" class="p-3 mt-1 w-full rounded-md border-gray-300 shadow-sm" readonly
                        name="idpembayaran" value="<?php echo $data['idpembayaran'];?>">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Pemesan</label>
                <input type="text" name="nama" value="<?php echo $data['nama'];?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No HP</label>
                <input type="text" name="nohp" value="<?php echo $data['nohp']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                <input type="text" name="metode_pembayaran" value="<?php echo $data['metode_pembayaran']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Total Bayar</label>
                <input type="text" name="total" value="Rp. <?php echo number_format($data['total'], 0, ',', '.'); ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Status Pembayaran</label>
                <select name="status_pembayaran" class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="Belum dibayar"
                        <?php echo $data['status_pembayaran'] == "Belum dibayar" ? "selected" : ""; ?>>Belum dibayar
                    </option>
                    <option value="Lunas" <?php echo $data['status_pembayaran'] == "Lunas" ? "selected" : ""; ?>>Lunas
                    </option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Bukti Bayar</label>
                <a href="../../img/<?php echo $data['buktibayar']; ?>" target="_blank">
                    <img src="../../img/<?php echo $data['buktibayar']; ?>" alt="Bukti Bayar"
                        class="p-3 mt-2 h-20 w-20 object-cover rounded">
                </a>
            </div>
        </div>
        <div class="pt-4">
            <button type="submit" class="bg-[#005EFF] text-white px-4 py-2 rounded hover:bg-blue-700">Simpan
                Perubahan</button>
            <a href="?page=pembayaran" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-black">Kembali</a>
        </div>
    </form>
</div>