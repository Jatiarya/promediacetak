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
        if(isset($_GET['email'])) {
        $email=$_GET['email'];
        $query = "SELECT  * FROM pengguna where email = '$email'";
        $result = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_array($result);
}
        //update data
        if(isset($_POST['role'])) {
            $role = $_POST['role'];
            $email = $_POST['email'];
            $queryUpdate = "UPDATE pengguna SET role = '$role' WHERE email = '$email'";
            if(mysqli_query($koneksi, $queryUpdate)) {
                echo '<div class="p-4 rounded bg-green-100 text-green-800 border border-green-300">
        Pengguna berhasil diverifikasi. <a href="dashboard.php?page=pembayaran"></a>
    </div>';
            } else {
                echo "<script>alert('Gagal verifikasi pengguna.');</script>";
            }
        }

    ?>

    <form class="bg-white p-6 rounded-xl shadow space-y-4 mt-5" method="POST" action="" enctype="multipart/form-data">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" value="<?php echo $data['username']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">ID Pesanan</label>
                <input type="text" name="email" value="<?php echo $data['email']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">NO HP</label>
                <input type="text" name="no_hp" value="<?php echo $data['no_hp']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="text" name="password" value="<?php echo $data['password']; ?>"
                    class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Status Pesanan</label>
                <select name="role" class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="admin" <?php echo $data['role'] == "admin" ? "selected" : ""; ?>>
                        Admin</option>
                    <option value="public" <?php echo $data['role'] == "public" ? "selected" : ""; ?>>
                        Public
                    </option>

                </select>
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-[#005EFF] text-white px-4 py-2 rounded hover:bg-blue-700">Simpan
                Perubahan</button>
            <a href="?page=pengguna" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-black">Kembali</a>
        </div>
    </form>
</div>