<h2>Insert Kategori</h2> <br>

<div class="form-group"> 
    <form action="" method="POST">
        <div class="form-group w-50">
        <label for="">Nama Kategori</label>
        <input type="text" name="kategori" required placeholder="Masukkan Kategori" class="form-control">
        </div> 
        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?php

    if (isset($_POST['simpan'])) {
        $kategori= $_POST['kategori'];

        $cekdata="select * from tblkategori where kategori='$kategori'";
        $jumlah=$db->rowCount($cekdata);  
     if($jumlah>0){
        $message = "Maaf data kategori $kategori sudah ada";
    echo "<script type='text/javascript'>alert('$message');</script>";
     }
    else{

        $sql="INSERT INTO tblkategori VALUES ('','$kategori')";
        $db->runSQL($sql);

        header("location:?f=kategori&m=select");
        //echo $sql;
    }
    }
    ?>