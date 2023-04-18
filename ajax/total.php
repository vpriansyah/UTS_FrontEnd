<?php
    require '../function.php';
    $sum = mysqli_query($conn, "SELECT SUM(totalan) FROM beli");
    while($fetch = mysqli_fetch_array($sum)){
    $hasil_rupiah = $fetch['SUM(totalan)'];
?>
    <h3><?="Rp " . number_format($hasil_rupiah,2,',','.');?></h3>
<?php
}
?>