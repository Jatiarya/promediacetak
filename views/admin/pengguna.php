<title>Pengguna</title>
<div class="max-w-7xl mx-auto">
    <header class="mb-6">
        <h1 class="text-3xl font-bold text-primary">Daftar Pengguna</h1>

    </header>
    <div class="overflow-auto rounded-xl shadow ring-1 ring-gray-200 bg-white">
        <table class="min-w-full text-sm text-gray-800">
            <thead class="bg-primary text-white bg-[#005EFF] text-left text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">No HP</th>
                    <th class="px-4 py-3">Kata Sandi</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Contoh data user -->
                <?php 
                    include '../../database/koneksi.php';
                    $query = "SELECT * FROM pengguna";
                    $result = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        $username = $row['username'];
                        $email = $row['email'];
                        $no_hp = $row['no_hp'];
                        $password = $row['password'];
                 ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium"><?php echo $row['username'];?></td>
                    <td class="px-4 py-3"><?php echo $row['email'];?></td>
                    <td class="px-4 py-3"><?php echo $row['no_hp'];?></td>
                    <td class="px-4 py-3 text-gray-500 italic"><?php echo $row['password'];?></td>
                    <td class="px-4 py-3"><?php echo $row['role'];?></td>
                    <td class="px-4 py-3 space-x-2">
                        <a href="?page=verifikasipengguna&email=<?php echo $row['email'] ?>"><button
                                class="cursor-pointer text-white px-3 py-1 rounded text-xs bg-blue-500 hover:bg-blue-900">
                                <i class="fa fa-pen"></i>
                            </button></a>
                        <a href='hapususer.php?email=<?php echo $row['email'];?>'
                            onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');"
                            class="cursor-pointer text-white px-3 py-1 rounded text-xs bg-red-500 hover:bg-red-900">
                            <i class="fa fa-trash"></i>
                        </a>

                    </td>
                </tr>
                <?php
                };
                ?>
                <!-- Tambahkan user lainnya di sini -->
            </tbody>
        </table>
    </div>
</div>