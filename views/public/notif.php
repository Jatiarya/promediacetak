<title>Notifikasi</title>
<div class="container p-5 mt-5 mx-auto bg-[#005EFF] w-[1130px] min-h-full rounded-[10px]">
    <header class="header">
        <h1 class="font-bold text-white text-[36px] p-10">Notifikasi</h1>
        <hr class="text-white w-[1050px] mx-auto">
    </header>
    <?php 
    include "../../database/koneksi.php";
    $tampil = "SELECT pesanan.nama, pesanan.layanan, pesanan.status_pesanan, pembayaran.status_pembayaran from pesanan INNER JOIN pembayaran ON pesanan.idpesanan=pembayaran.idpesanan";
    $query = mysqli_query($koneksi, $tampil);
    while($data=mysqli_fetch_array($query)) {
    ?>
    <div class="notif-card p-3 bg-white w-[1050px] h-[120px] mx-auto mt-5 rounded-sm flex flex-col gap-1">
        <h1 class="text-[20px]  font-medium">Pesanan <?php echo $data['layanan'];?></h1>
        <h1 class=" font-medium flex gap-1">Status Pembayaran :<p class="text-green-500">
                <?php echo $data['status_pembayaran']; ?></p>
        </h1>
        <h1 class=" flex font-medium gap-1">Status Pesanan <?php echo $data['layanan']?>: <P class="text-blue-500">
                <?php echo $data['status_pesanan'];?> </P>
        </h1>
    </div>
    <?php 
    }
    ?>
</div>