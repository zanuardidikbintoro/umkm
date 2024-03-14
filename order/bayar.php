<?php

$total=0;
?>


<h2>Pembayaran Pesanan nomor meja <?=$_GET['id'];?></h2> <br>
<?php
    if (isset($_GET['id'])) {
        $id= $_GET['id'];
    }
    $email = 4;
    $jumlahdata = $db->rowCount("SELECT idorderdetail FROM tblorderdetail WHERE idorder=$id ");
    $banyak = 10;
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])){
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    }else {
        $mulai = 0;
    }

    $sql="SELECT * FROM tblorderdetail WHERE idorder=$id ORDER BY idorderdetail ASC LIMIT $mulai,$banyak";
    $row = $db->getAll($sql);

    $no=1+$mulai;
?>

<table class="table table-bordered w-70">
   <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Pic</th>
            <th>Harga</th>
            <th>Jumlah</th>
            
        </tr>
   </thead>

   <tbody>
   <?php if(!empty($row)){ ?>
    <?php foreach($row as $r): ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td>
                
            <?php 
            
            $getdata="select * from tblorder where idorder=$id";
            $dt=$db->getITEM($getdata);
            ?>
            <?php echo $dt['tglorder']?></td>
            <?php 
            
            $getdata="select * from tblmenu where idmenu=$r[idmenu]";
            $h=$db->getITEM($getdata);
            ?>
            <td><?php echo $h['menu']?></td>
            <td><img src=../upload/<?php echo $h['gambar']?> width=150></td>
            <td><?php echo $r['hargajual']?></td>
            <td><?php echo $r['jumlah']?></td>
            
           
            
        </tr>
        <?php endforeach ?>
        <?php } ?>
   </tbody>
</table>

<?php
    if (isset($_GET['id'])) {
        $id=$_GET['id'];

        $sql = "SELECT * FROM tblorder WHERE idorder=$id";

            $row = $db->getITEM($sql);
            $total=0;

           
    }

    ?>
<?php
$gt = "select * from tblorder where idorder=$id";
$kembali = $db->getITEM($gt);
//echo $kembali['kembali'] ?>

<div class="form-group"> 
    <form action="" method="POST">
        <div class="form-group w-50">
        <label for="">Grand Total :</label>
        <input type="number" name="total" required value="<?php echo $row['total'] ?>" class="form-control">
        </div> 
        <div class="form-group w-50">
        <label for="">Bayar :</label>
        <input type="number" name="bayar" required  class="form-control">
        </div> 
        <div>
            <input type="submit" name="simpan" value="bayar" class="btn btn-primary">
        </div>
       
    </form>
</div>

<?php

     if (isset($_POST['simpan'])) {
         $bayar= $_POST['bayar'];
         $kembali =  $bayar - $row['total'] ;

         $sql="UPDATE tblorder SET bayar=$bayar, kembali=$kembali, status=1 WHERE idorder=$id";

         if ($kembali < 0) {
            echo "<h3> Pembayaran Kurang </h3>";
         }else{
           echo "<h3> Kembalian Anda $kembali</h3>";
          $db->runSql($sql);
                header("location:?f=order&m=select"); 
         }

     }

    ?> 
 
