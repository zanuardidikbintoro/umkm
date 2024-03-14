<?php

    if (isset($_GET['id'])) {
        $id=$_GET['id'];
       $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";
        $item = $db->getITEM($sql);

        $idkategori = $item['idkategori'];
      
       

 
    }
    $sql="SELECT * FROM tblkategori ORDER BY kategori ASC";
    $row=$db->getAll($sql);

?>


<h2>Update Menu</h2> <br>

<div class="form-group"> 
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group w-50">
        
        <label for="">Kategori</label><br>
        <select name="idkategori" id="">
            <?php foreach($row as $r) : ?>
            <option <?php if ($idkategori == $r['idkategori']) echo "selected"?> value="<?php echo $r['idkategori']?>" ><?php echo $r['kategori']?></option>
            <?php endforeach ?>
        </select>
        </div> 
        
        <div class="form-group w-50">
        <label for="">Nama Menu</label>
        <input type="text" name="menu" required value="<?php echo $item['menu']?>" class="form-control">
        </div> 
        <div class="form-group w-50">
        <label for="">Harga</label>
        <input type="text" name="harga" required value="<?php echo $item['harga']?>" class="form-control">
        </div>  
        <div class="form-group w-50">
        <label for="">Gambar Menu</label> <br>
        <input type="file" name="gambar" >
        </div> 
        <div class="form-group w-50">
        <label for="">Stok</label>
        <input type="number" name="stok" required value="<?php echo $item['stok']?>" class="form-control">
        </div>  
        
        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?php

    if (isset($_POST['simpan'])) {
        $idkategori=$_POST['idkategori'];
        $menu = $_POST['menu'];
        $harga = $_POST['harga'];
        $gambar = $item['gambar'];
        $stok = $_POST['stok'];
   

        // 
        $temp = $_FILES['gambar']['tmp_name'];

        if (!empty($temp)) {
            $gambar = $gambar = $_FILES['gambar']['name'];
            move_uploaded_file($temp,'../upload/'.$gambar);
        }


        $sql = "UPDATE tblmenu SET idkategori = $idkategori, menu='$menu',gambar='$gambar' ,
         harga=$harga, stok=$stok  WHERE idmenu= $id";
        $db->runSQL($sql);
        //header("location:?f=menu&m=select");
        echo "<meta http-equiv='refresh' content='0;url=?f=menu&m=select'>";


    }

    ?>