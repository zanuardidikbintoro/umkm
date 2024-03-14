<?php

    $sql="SELECT * FROM tblkategori ORDER BY kategori ASC";
    $row=$db->getAll($sql);

?>
<h2>Insert Menu</h2> <br>

<div class="form-group"> 
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group w-50">
        
        <label for="">Kategori</label><br>
        <select name="idkategori" id="">
            <?php foreach($row as $r) : ?>
            <option value="<?php echo $r['idkategori']?>"><?php echo $r['kategori']?></option>
            <?php endforeach ?>
        </select>
        </div> 
        
        <div class="form-group w-50">
        <label for="">Nama Menu</label>
        <input type="text" name="menu" required placeholder="Masukkan menu" class="form-control">
        </div>  <div class="form-group w-50">
        <div class="form-group w-50">
        <label for="">Harga</label>
        <input type="text" name="harga" required placeholder="Masukkan harga" class="form-control">
        </div>  
        <div class="form-group w-50">
        <label for="">Gambar Menu</label> <br>
        <input type="file" name="gambar" >
        </div> 
        <label for="">Stok</label>
        <input type="number" name="stok" required placeholder="Masukkan stok" class="form-control">
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
        $gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];
        $stok = $_POST['stok'];

    
    $cekdata="select * from tblmenu where menu='$menu'";
    $jumlah=$db->rowCount($cekdata);  
 if($jumlah>0){
    $message = "Maaf data menu $menu sudah ada";
echo "<script type='text/javascript'>alert('$message');</script>";
 }
else{
        if (empty($gambar)) {
            echo "<h4> Gambar Belum Diisi<h4>";
        }else{
             $sql="INSERT INTO tblmenu VALUES ('',$idkategori,'$menu','$gambar',$harga,$stok)";
             echo $sql;
            // $sql="INSERT INTO tblstok VALUES ('','$menu',$stok)";
            //echo $sql;
            move_uploaded_file($temp,'../upload/'.$gambar);
            $db->runSQL($sql);
            //header("location:?f=menu&m=select");
            echo "<meta http-equiv='refresh' content='0;url=?f=menu&m=select'>";
        }

      
        // 

        // 
        //echo $sql;
    }
}

    ?>