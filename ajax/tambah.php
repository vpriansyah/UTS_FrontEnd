<?php
    $data = $_POST['select'];
    require '../function.php';
    $cari_harga = mysqli_query($conn, "SELECT * FROM `data_motor` WHERE nama = '".$data."'");
    $pecah = mysqli_fetch_array($cari_harga);
    $harga = $pecah['harga'];
    $insert = mysqli_query($conn, "INSERT INTO `beli` (`Id_penjualan`, `nama_motor`, `jumlah`) VALUES (NULL, '".$data."', '".$harga."')");
?>