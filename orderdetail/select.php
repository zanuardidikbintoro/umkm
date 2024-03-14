<h2>Detail Penjualan</h2> <br>

<div class="form-group"> 
    <form action="" method="POST">
        <div class="form-group w-50 float-left">
        <label for="">Tanggal Awal</label>
        <input type="date" name="tawal" required class="form-control">
        </div> 
        <div class="form-group w-50 float-left">
        <label for="">Tanggal Akhir</label>
        <input type="date" name="takhir" required class="form-control">
        </div> 
        <div>
            <input type="submit" name="simpan" value="Cari" class="btn btn-primary">
           
        </div>
    </form>
</div>

<?php

  
    $jumlahdata = $db->rowCount("SELECT idorder FROM tblorder ");
    $banyak = 5;
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])){
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    }else {
        $mulai = 0;
    }

    $sql="select * from tblmenu left join tblorderdetail on tblmenu.idmenu=tblorderdetail.idmenu join tblorder on tblorder.idorder=tblorderdetail.idorder ORDER BY tblorder.idorder DESC LIMIT $mulai,$banyak";
    
    if (isset($_POST['simpan'])) {
        $tawal = $_POST['tawal'];
        $takhir = $_POST['takhir'];
        
        $sql = "select * from tblmenu left join tblorderdetail on tblmenu.idmenu=tblorderdetail.idmenu join tblorder on tblorder.idorder=tblorderdetail.idorder WHERE tblorder.tglorder BETWEEN '$tawal' AND '$takhir'";
        //echo $sql;
    }
    $row = $db->getAll($sql);

    $no=1+$mulai;

    $total =0;
?>




<?php
            function Rupiah ($angka){
                $hasil = "Rp".number_format($angka,2,',','.');
                return $hasil;
            }
            ?>
<?php if(isset($tawal)){ ?>
<div class="text-right"><a href="../orderdetail/cetaklaporan.php?tawal=<?=$tawal;?>&takhir=<?=$takhir;?>" class=" btn btn-info" target="_blank">Cetak Laporan</a></div> <br>
<?php } ?>

<table class="table table-bordered w-70">
   <thead>
        <tr>
            <th>No</th>
            <th>Nomor Pesanan</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
   </thead>

   <tbody>
   <?php if(!empty($row)){ ?>
    <?php foreach($row as $r): ?>
        
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['idorder']?></td>
            <td><?php echo $r['tglorder']?></td>
            <td><?php echo $r['menu']?></td>
            <td><?php echo Rupiah($r['harga'])?></td>
            <td><?php echo $r['jumlah']?></td>
            <td><?php echo Rupiah($r['jumlah'] * $r['harga'])?></td>
           

           <?php

            $total = $total + ($r['jumlah'] * $r['harga']);

            ?>
            
        </tr>
        <?php endforeach ?>
        <?php } ?>

        <tr>
            <td colspan="6"><h3>Grand Total</h3></td>
            <td><h4><?php echo Rupiah($total) ?></h4></td>
        </tr>


   </tbody>
</table>


<?php
    for($i=1; $i <= $halaman ; $i++){
        echo '<a href="?f=orderdetail&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>
