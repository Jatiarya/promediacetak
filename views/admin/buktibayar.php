<?php
include "../../database/koneksi.php";
    $query = "SELECT * FROM pesanan";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($result);
?>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<img src="../../img/<?php echo $data['buktibayar'] ;?>" alt="" style="height: 50; width: 50;">