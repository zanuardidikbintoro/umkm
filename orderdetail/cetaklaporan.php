<script>window.print()</script>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

<?php


require_once "../dbcontroller.php";
$db = new DB;
$tawal=$_GET['tawal'];
$takhir=$_GET['takhir'];
$no=0;



?>

<h1 class="text-center">Laporan Penjualan UMKM Funfood</h1>
<h5 class="text-center">Data tanggal <?=$tawal;?> hingga <?=$takhir;?></h5>

<h6 class="text-center">Shelter Kuliner Kutoarjo<br>
Jalan Mardiusodo No.10</h6>
<?php

  
 
if($tawal!=NULL){
        $sql = "select * from tblmenu left join tblorderdetail on tblmenu.idmenu=tblorderdetail.idmenu join tblorder on tblorder.idorder=tblorderdetail.idorder WHERE tblorder.tglorder BETWEEN '$tawal' AND '$takhir'";
}

    
    $row = $db->getAll($sql);

    $no=$no+1;

    $total =0;
?>




<?php
            function Rupiah ($angka){
                $hasil = "Rp".number_format($angka,2,',','.');
                return $hasil;
            }
            ?>

<table class="table table-bordered table-striped">
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


