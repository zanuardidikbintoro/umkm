<?php
  
    $jumlahdata = $db->rowCount("SELECT idorder FROM tblorder ");
    $banyak = 10;
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])){
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    }else {
        $mulai = 0;
    }

    $sql="SELECT * FROM tblorder ORDER BY idorder DESC LIMIT $mulai,$banyak";
    $row = $db->getAll($sql);

    $no=1+$mulai;
?>



<h2>Data Penjualan</h2> <br>



<table class="table table-bordered w-50 table-striped">
   <thead>
        <tr>
            <th>No</th>
            <th>Nomor Pesanan</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Bayar</th>
            <th>Kembali</th>
            <th>Status</th>
            <th>Tampil</th>
            <th>Delete</th>
          
            
        </tr>
   </thead>

   <tbody>
   <?php
            function Rupiah ($angka){
                $hasil = "Rp".number_format($angka,2,',','.');
                return $hasil;
            }
            ?>
   <?php if(!empty($row)){ ?>
    <?php foreach($row as $r): ?>
        <?php

            if ($r['status']==0) {
                $status = '<td><a class="btn btn-info" href="?f=order&m=bayar&id='.$r['idorder'].'">Bayar</a></td>';
            }else{
                $status = '<td><font class="text-info">LUNAS</font></td>';
            }
        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['idorder']?></td>
            <td><?php echo $r['tglorder']?></td>
            <td><?php echo Rupiah($r['total'])?></td>
            <td><?php echo Rupiah($r['bayar'])?></td>
            <td><?php echo Rupiah($r['kembali'])?></td>
            <?php echo $status ?>
            <td><a href="?f=order&m=cetak&id=<?php echo $r['idorder']?>" class="btn btn-warning">Tampil</a></td>
            <td> <a href="?f=order&m=delete&id=<?php echo $r['idorder']?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php endforeach ?>
        <?php } ?>
   </tbody>
</table>


<?php
    for($i=1; $i <= $halaman ; $i++){
        echo '<a href="?f=order&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>