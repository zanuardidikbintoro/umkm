



<h2>Menu</h2> <br>

<?php

    if (isset($_POST['opsi'])) {
        $opsi = $_POST['opsi'];
        if($opsi!=0)

        $where = "WHERE idkategori = $opsi";
        if($opsi==0) $where="";
        //echo $where;
    }
    else{
        $opsi=0;
        $where="";
    }

?>


<a  class ="btn btn-primary" href="?f=menu&m=insert" role="button">Tambah Data</a> <br>


<div class="mt-4">
     <?php

        $row=$db-> getAll("SELECT * FROM tblkategori ORDER BY kategori ASC");
    
    ?> 

    <form action="" method="post">

        <select name="opsi" id="" onchange="this.form.submit()">
        <option value="0">-Pilih Kategori-</option>
        <?php foreach ($row as $r): ?>
        <option <?php if($r['idkategori']==$opsi) echo"selected"; ?> value="<?php echo $r['idkategori']  ?>">
        <?php echo $r['kategori']  ?></option>
        <?php endforeach ?>
        </select>
    </form>
</div> <br>

<?php
    $jumlahdata = $db->rowCount("SELECT idmenu FROM tblmenu $where");
    $banyak = 30;
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





<table class="table table-bordered w-80">
   <thead>
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Stok</th>
            <th>Update</th>
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
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['menu'] ?></td>
            <td><?php echo Rupiah($r['harga']) ?></td>
            <td><img style="width:80px"src="../upload/<?php echo $r['gambar'] ?>" alt=""></td>
            <td><?php echo $r['stok'] ?></td>
            <td><a href="?f=menu&m=update&id=<?php echo $r['idmenu']?>">Update</a></td>
            <td> <a href="?f=menu&m=delete&id=<?php echo $r['idmenu']?>">Delete</a></td>
            <td></td>
        </tr>
        <?php endforeach ?>
        <?php }?>
   </tbody>
</table>


<?php
    // for($i=1; $i <= $halaman ; $i++){
    //     echo '<a href="?f=menu&m=select&p='.$i.'">'.$i.'</a>';
    //     echo '&nbsp &nbsp &nbsp';
    // }

?>

