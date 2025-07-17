<title>Pembayaran</title>
<div class="max-w-6xl mx-auto mt-5">
    <header class="mb-6">
        <h1 class="text-3xl font-bold text-primary">
            Pembayaran
        </h1>
    </header>
    <div id="alertSuccess" class="hidden fixed p-4 rounded bg-green-100 text-green-800 border border-green-300">
        Status pembayaran berhasil diperbarui.
    </div>
    <div class="h-[80px]"></div>
    <div class="overflow-auto rounded-xl shadow ring-1 ring-gray-200 ">
        <table class="min-w-full text-sm text-gray-800 bg-white">
            <thead class="bg-primary text-white bg-[#005EFF] text-left text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-4 py-3">Waktu</th>
                    <th class="px-4 py-3">ID Pesanan</th>
                    <th class="px-4 py-3">ID Pembayaran</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">No Hp</th>
                    <th class="px-4 py-3">Metode</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Bukti</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php
                    include "../../database/koneksi.php";
                    $query = "SELECT pesanan.idpesanan, pembayaran.idpembayaran, pesanan.waktu, pesanan.nama, pesanan.nohp, pembayaran.metode_pembayaran, pembayaran.total, pembayaran.buktibayar, pembayaran.status_pembayaran FROM pesanan INNER JOIN pembayaran ON pesanan.idpesanan=pembayaran.idpesanan; ";
                    $result = mysqli_query($koneksi, $query);
                    while($data = mysqli_fetch_array($result)) {
                 ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium"><?php echo $data['waktu'];?></td>
                    <td class="px-4 py-3 font-medium"><?php echo $data['idpesanan'];?></td>
                    <td class="px-4 py-3 font-medium"><?php echo $data['idpembayaran'];?></td>
                    <td class="px-4 py-3 font-medium"><?php echo $data['nama'];?></td>
                    <td class="px-4 py-3"><?php echo $data['nohp'];?></td>
                    <td class="px-4 py-3"><?php echo $data['metode_pembayaran'];?></td>
                    <td class="px-4 py-3">RP. <?php echo $data['total'] ?></td>
                    <td class="px-4 py-3">
                        <a href="../../img/<?php echo $data['buktibayar']; ?>" target="__blank"><img
                                src="../../img/<?php echo $data['buktibayar']; ?>" style="height: 50; width: 50;"
                                alt=""></a>
                    </td>
                    <td class="flex px-4 py-3">
                        <p class="block py-5 text-green-500">
                            <?php if( $data['status_pembayaran']=="Lunas") {echo "Lunas";}?>
                        </p>
                        <p class="block py-5 text-red-500">
                            <?php if( $data['status_pembayaran']=="Belum dibayar") {echo "Belum dibayar";}?>
                        </p>
                    </td>
                    <td class="px-4 py-3 space-x-2">
                        <a href="?page=editpembayaran&idpembayaran=<?php echo $data['idpembayaran'];?>"
                            class="cursor-pointer bg-secondary text-white font-bold px-3 py-1 rounded bg-[#005EFF] hover:bg-blue-900">
                            <i class="fa fa-pen"></i>
                        </a>&nbsp;
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

    </div>
</div>