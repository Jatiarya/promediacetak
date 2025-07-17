<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php");
    exit();
}
?>

<!-- Lanjutkan dengan isi halaman beranda -->

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<body class="scroll-smooth">

    <nav
        class="bg-[#005EFF] sticky top-2 flex items-center justify-between p-4 text-white w-[1140px] h-[60px] mx-auto rounded-[50px]">
        <div class="logo px-3">
            <a href="" class="">
                <img src="../../img/logo.jpeg" class="p-1 w-[100px] h-[50px] rounded-md" alt="">
            </a>
        </div>
        <div class="nav-link flex gap-10">
            <li class="list-none"><a href="beranda.php">Beranda</a></li>
            <li class="list-none"><a href="?page=pesan">Pesan</a></li>

        </div>
        <div class="btn mr-5 flex gap-3 items-center">
            <div>
                <a href="?page=notif"><i class="fa fa-bell text-[20px]"></i></a>
            </div>
            <div class="relative " x-data="{ open: false }">
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
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <!-- Menu Item: Logout -->
                    <span class="text-black text-sm px-4 py-2 flex font-medium">Username :
                        <?php echo ($_SESSION['username']); ?></span>
                    <a href="logout.php" class="w-full px-4 py-2 text-sm text-red-600" role="menuitem"
                        tabindex="-1">Keluar</a>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <?php
        include 'template.php';
        ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>