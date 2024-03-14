<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page | Funfood</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>


<font face="consolas">
    <?php

    session_start();
    $total = 0;
    require_once "../dbcontroller.php";
    $db = new DB;
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
  <title>Struk Pesanan No <?=$_GET['id'];?> - UMKM Funfood</title>
  <script>
		window.print();
	</script>
    <div class="col-md-4 text-center">
        <h2>UMKM Funfood</h2>
        Shelter Kuliner Kutoarjo<br>
        Jalan Mardiusodo No.10<br>
        <hr>
        Nomor Pesanan:<?= $_GET['id']; ?><br>
        Tanggal Pembelian:<?php

                            $gt = "select * from tblorder where idorder=$id";
                            $tgl = $db->getITEM($gt);
                            echo $tgl['tglorder'] ?><br>
        <br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>

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

                            <td><?php echo $r['menu'] ?></td>
                            <td align="right"><?php echo Rupiah($r['harga']) ?></td>
                            <td><?php echo $r['jumlah'] ?></td>
                            <td align="right"><?php echo Rupiah($r['jumlah'] * $r['harga']) ?></td>

                            <?php
                           $total = $total + ($r['jumlah'] * $r['harga']);
                            ?>
                            <?php

$gt = "select * from tblorder where idorder=$id";
$bayar = $db->getITEM($gt);
echo $bayar['bayar'] ?>

<?php

$gt = "select * from tblorder where idorder=$id";
$kembali = $db->getITEM($gt);
echo $kembali['kembali'] ?>

                        </tr>
                    <?php endforeach ?>
                <?php } ?>
                <tr>
                    <td colspan="4" align="right">
                        <h6>Grand Total</h6>
                    </td>
                    <td>
                        <h6><?php echo Rupiah($total) ?></h6>
                    </td>
                </tr>
                <tr>
                <td colspan="4" align="right">
                        <h6>Bayar</h6>
                    </td>
                    <td>
                        <h6><?php echo Rupiah($bayar['bayar']) ?></h6>
                    </td>
                </tr>
                <tr>
                <td colspan="4" align="right">
                        <h6>Kembali</h6>
                    </td>
                    <td>
                        <h6><?php echo Rupiah($kembali['kembali'])?></h6>
                    </td>
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




        <?php

        $gt = "select * from tblorder where idorder=$id";
        $stat = $db->getITEM($gt);
        if ($stat['status'] == 0) {
            $status = "Belum Lunas";
        } else {
            $status = "LUNAS";
        }
        ?>
        <label for="">Status :</label>
        <?php echo $status ?>




        <br>Terimakasih telah berbelanja di tempat kami

    </div>