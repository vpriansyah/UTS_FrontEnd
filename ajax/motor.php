<table border="1" class="table">
<tr class="bg-success text-white"><th>No</th><th>Id Kendaraan</th><th>Nama Kendaraan</th><th>Harga</th><th>Tahun</th></tr>
<?php
require '../function.php';
$id_motor = $_GET['id_motor'];
$no = 1;
$data = mysqli_query($conn, "SELECT `Id`, `nama`, `harga`, `tahun` FROM `data_motor` WHERE nama = '$id_motor' OR Id = '$id_motor' OR harga = '$id_motor' OR tahun = '$id_motor'");
while($hasil = mysqli_fetch_array($data)){
?>
    <tr>
        <td><?= $no++ ;?></td>
        <td><?= $hasil['Id'];?></td>
        <td><?= $hasil['nama'];?></td>
        <td><?="Rp " . number_format($hasil['harga'],2,',','.');?></td>
        <td><?= $hasil['tahun'];?></td>
    </tr>
<?php
}
?>
</table>