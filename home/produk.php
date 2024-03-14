
<h2>Menu</h2> <br>





<div class="mt-4">
     <?php

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $where = "WHERE idkategori=$id";

            $id="&id=".$id;

           

        }else {
            $where ="";
            $id="";
        }
    ?> 

  
</div> <br>

<?php
    $jumlahdata = $db->rowCount("SELECT idmenu FROM tblmenu $where");
    $banyak = 3;
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])){
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    }else {
        $mulai = 0;
    }

    $sql="SELECT * FROM tblmenu $where ORDER BY menu ASC LIMIT $mulai,$banyak";
    $row = $db->getAll($sql);

    $no=1+$mulai;
?>

<?php
            function Rupiah ($angka){
                $hasil = "Rp".number_format($angka,2,',','.');
                return $hasil;
            }
            ?>

    <?php if(!empty($row)){ ?>
    <?php foreach($row as $r): ?>
        <?php
            if ($r['stok']>0) {
                $stok = "Habis";
            }else{
                $stok = $r['stok'];
            }
                ?>
           
               

        <div class="card" style = "width: 15rem; float:left; margin:15px;">
        <img style="height:200px"src="upload/<?php echo $r['gambar'] ?>" class="card-img-top" alt="">
        <div class = "card-body">
            <h5 class="card-title"><?php echo $r['menu'] ?></h5>
            <p class="card-text"><?php echo rupiah($r['harga']) ?></p>
           
           <?php
           if ($r['stok']>0) {
           echo '<a class="btn btn-primary" href="?f=home&m=beli&id='.$r['idmenu'].'" role="button">Beli</a>';
           echo  '<p class="card-text">Tersedia:'.$r['stok'].'</p>';
           }else{
            echo '<a class="btn btn danger" disabled="disabled">Maaf Brang Tidak Tersedia </a>';
           }
           ?>
            
            <!-- <a class="btn btn-primary" href="?f=home&m=beli&id=<?php echo $r['idmenu']?>" role="button">Beli</a> -->
            
        
    </div>
    </div>

       
        <?php endforeach ?>
        <?php }?>

        <div style="clear:both;">
   
<div>
<?php
    for($i=1; $i <= $halaman ; $i++){
        echo '<a href="?f=home&m=produk&p='.$i.$id.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>
</div>

