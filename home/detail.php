<?php
    if (isset($_GET['id'])) {
        $id= $_GET['id'];
    }
    $email = $_SESSION['pelanggan'];
    $jumlahdata = $db->rowCount("SELECT idorderdetail FROM vorderdetail WHERE idorder=$id ");
    $banyak = 3;
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])){
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    }else {
        $mulai = 0;
    }

  

    $sql="SELECT * FROM vorderdetail WHERE idorder=$id ORDER BY idorderdetail ASC LIMIT $mulai,$banyak";
    $row = $db->getAll($sql);

    $no=1+$mulai;
?>



<h2>Detail Pembelian</h2> <br>



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
   <?php if(!empty($row)){ ?>
    <?php foreach($row as $r): ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['tglorder']?></td>
            <td><?php echo $r['menu']?></td>
            <td><?php echo $r['harga']?></td>
            <td><?php echo $r['jumlah']?></td>
              <td><?php echo $r['jumlah'] * $r['harga']?></td>
           
            
           
            
        </tr>
        <?php endforeach ?>
        <?php } ?>
        <div class="form-group"> 
    
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

<form action="" method="POST">
        <div class="form-group w-50">
        <label for="">Grand Total :</label>
        <input type="number" name="total" required value="<?php echo $row['total'] ?>" class="form-control">
        </div> 
        <div class="form-group"> 
  
        <div class="form-group w-50">
        <?php if ($r['status']==0){
            $status = "<h4>Belum Lunas</h4>";
        }else{
            $status = "<h4>LUNAS</h4>";
        }
        ?>
        <label for="">Status :</label>
        <h2><?php echo $status ?>
    </div>


