<?php

$total = 0;
?>
<script>
    window.print
</script>


<h2>Pembayaran Pesanan</h2>
<div class="text-right"><a href="../order/cetakstruk.php?id=<?= $_GET['id']; ?>" class=" btn btn-info" target="_blank">Cetak Struk</a></div> <br>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$jumlahdata = $db->rowCount("SELECT idorderdetail FROM tblorderdetail WHERE idorder=$id ");
$banyak = 3;
$halaman = ceil($jumlahdata / $banyak);

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    $mulai = ($p * $banyak) - $banyak;
} else {
    $mulai = 0;
}

//$sql="SELECT * FROM tblorderdetail WHERE idorder=$id ORDER BY idorderdetail ASC LIMIT $mulai,$banyak";
$sql = "select * from tblmenu left join tblorderdetail on tblmenu.idmenu=tblorderdetail.idmenu and tblorderdetail.idorder=$id HAVING tblorderdetail.hargajual";
$row = $db->getAll($sql);

$no = 1 + $mulai;
?>

<table class="table table-bordered w-70">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>

        </tr>
    </thead>

    <tbody>
        <?php
        function Rupiah($angka)
        {
            $hasil = "Rp" . number_format($angka, 2, ',', '.');
            return $hasil;
        }
        ?>
        <?php if (!empty($row)) { ?>
            <?php foreach ($row as $r) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php

                        $gt = "select * from tblorder where idorder=$id";
                        $tgl = $db->getITEM($gt);
                        echo $tgl['tglorder'] ?></td>
                    <td><?php echo $r['menu'] ?></td>
                    <td><?php echo Rupiah($r['harga']) ?></td>
                    <td><?php echo $r['jumlah'] ?></td>
                    <td><?php echo Rupiah($r['jumlah'] * $r['harga']) ?></td>

                    <?php
                    $total = $total + ($r['jumlah'] * $r['harga']);
                    ?>
                    <?php

$gt = "select * from tblorder where idorder=$id";
$bayar = $db->getITEM($gt);
// echo $bayar['bayar']
?>

<?php

$gt = "select * from tblorder where idorder=$id";
$kembali = $db->getITEM($gt);
// echo $kembali['kembali'] ?>
                </tr>
            <?php endforeach ?>
        <?php } ?>
        <tr>
            <td colspan="5">
                <h3>Grand Total</h3>
            </td>
            <td>
                <h4><?php echo Rupiah($total) ?></h4>
            </td>
            <tr>
                <td colspan="5" align="right">
                        <h3>Bayar</h3>
                    </td>
                    <td>
                        <h4><?php echo Rupiah($bayar['bayar']) ?></h4>
                    </td>
                </tr>
                <tr>
                <td colspan="5" align="right">
                        <h3>Kembali</h3>
                    </td>
                    <td>
                        <h4><?php echo Rupiah($kembali['kembali'])?></h4>
                    </td>
                </tr>

        </tr>
    </tbody>
</table>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tblorder WHERE idorder=$id";

    $row = $db->getITEM($sql);
    //$total=0;


}

?>



<div class="form-group w-50">
    <?php

    $gt = "select * from tblorder where idorder=$id";
    $stat = $db->getITEM($gt);
    if ($stat['status'] == 0) {
        $status = "<h4>Belum Lunas</h4>";
    } else {
        $status = "<h4>LUNAS</h4>";
    }
    ?>
    <label for="">Status :</label>
    <h2><?php echo $status ?>
</div>






</form>
</div>

<?php

if (isset($_POST['simpan'])) {
    $bayar = $_POST['bayar'];
    $kembali =  $bayar - $row['total'];

    $sql = "UPDATE tblorder SET bayar=$bayar, kembali=$kembali, status=1 WHERE idorder=$id";

    if ($kembali < 0) {
        echo "<h3> Pembayaran Kurang </h3>";
    } else {
        $db->runSql($sql);
        header("location:?f=order&m=select");
    }
}

?>