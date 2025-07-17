<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    if (file_exists("$page.php")) {
        include "$page.php";
    } else {
        echo '<div class="card">
                <div class="card-body">
                    <h5 class="card-title">Halaman Tidak ditemukan</h5>
                </div>
                </div>';
    }
} else {
    include 'index.php';
}
?>