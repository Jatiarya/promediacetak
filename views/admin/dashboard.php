<?php
include "../../database/koneksi.php";
?>
<!-- link chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
    integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js">
// configurasi
const config = {
    type: 'line',
    data: data,
};
</script>
<!-- Link Konfigurasi Framework Tailwindcss -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="min-h-full">
    <nav class="bg-[#005EFF] sticky top-0 z-99">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <a href="dashboard.php">
                            <img class="p-1  w-[100px] h-[50px] object-cover rounded-md" src="../../img/logo.jpeg"
                                alt="Your Company">
                        </a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="dashboard.php" class="rounded-md  px-3 py-2 text-sm font-medium text-white"
                                aria-current="page">Dashboard</a>
                            <a href="?page=pesanan" class="rounded-md  px-3 py-2 text-sm font-medium text-white"
                                aria-current="page">Pesanan</a>
                            <a href="?page=pembayaran" class="rounded-md  px-3 py-2 text-sm font-medium text-white"
                                aria-current="page">Pembayaran</a>
                            <a href="?page=pengguna" class="rounded-md  px-3 py-2 text-sm font-medium text-white"
                                aria-current="page">Pengguna</a>
                            <a href="?page=laporan" class="rounded-md  px-3 py-2 text-sm font-medium text-white"
                                aria-current="page">Laporan</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        <div class="relative ml-3" x-data="{ open: false }">
                            <!-- Button Avatar -->
                            <div>
                                <button @click="open = !open" type="button"
                                    class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <img class="size-8 rounded-full" src="../../img/profile.jpg" alt="Profile">
                                </button>
                            </div>

                            <!-- Dropdown Menu -->
                            <div x-show="open" @click.away="open = false" x-transition
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <!-- Menu Item: Logout -->
                                <a href="logout.php" class="w-full text-left px-4 py-2 text-sm text-red-600 "
                                    role="menuitem" tabindex="-1">Logout</a>
                            </div>
                        </div>

                        <!-- Alpine.js CDN -->
                        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <main class="flex-1 px-6 py-2 sticky top-0 shadow-sm">
        <h1 class="text-3xl font-bold text-primary ">Dashboard</h1>
    </main>
    <?php
    include 'template.php';
    ?>
    </main>
</div>
<!-- Tambahkan Alpine.js untuk interaktivitas -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>