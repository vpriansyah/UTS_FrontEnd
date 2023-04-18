<?php
require '../function.php';
ini_set('display_errors',0);
$id_motor = $_POST['jumlah'];
$id = $_POST['id'];
$no = 1;
$data = mysqli_query($conn, "select * from beli where Id_penjualan = '".$id."'");
$hasil = mysqli_fetch_array($data);
$totalan = $hasil['jumlah']*$id_motor;
$id_penjualan = $hasil['Id_penjualan'];
$update_total_harga = mysqli_query($conn, "UPDATE `beli` SET `totalan` = '".$totalan."', `put` = '".$id_motor."' WHERE `Id_penjualan` = '".$id."'");
if($update_total_harga){?>
    <table border="1" class="table">
                <tr class="bg-success text-white"><th>Id Penjualan</th><th>Nama Kendaraan</th><th>Harga</th><th>Jumlah</th><th>Total</th></tr>
            <?php
                require '../function.php';
                $no = 1;
                $data = mysqli_query($conn, "select * from beli");
                while($hasil = mysqli_fetch_array($data)){
                $patok = $hasil['Id_penjualan'];
            ?>
                <tr>
                    <td><?= $hasil['Id_penjualan'];?></td>
                    <td><?= $hasil['nama_motor'];?></td>
                    <td><?="Rp " . number_format($hasil['jumlah'],2,',','.');?></td>
                    <input id="<?=$no++;?>" type="hidden" value="<?=$id_motor;?>">
                    <td><input type="num" min="1" class="form-control" name="jumlah" id="jumlah<?=$patok;?>" value="<?=$hasil['put'];?>" onkeyup='kolom("<?=$patok;?>")'></td>
                    <td><?="Rp " . number_format($hasil['totalan'],2,',','.');?></td>
                </tr>
            <?php
                }
            ?>
            </table>
<?php
}
?>
