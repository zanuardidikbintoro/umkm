<?php
    if (isset($_GET['id'])) {
        $id=$_GET['id'];

        $sql = "SELECT * FROM tblkategori WHERE idkategori=$id";

            $row = $db->getITEM($sql);
    }

    ?>

<h2>Update Data Kategori</h2> <br>

<div class="form-group"> 
    <form action="" method="POST">
        <div class="form-group w-50">
        <label for="">Nama Kategori :</label>
        <input type="text" name="kategori" required value="<?php echo $row['kategori'] ?>" class="form-control">
        </div> 
        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?php

     if (isset($_POST['simpan'])) {
         $kategori= $_POST['kategori'];

         $sql="UPDATE tblkategori SET kategori='$kategori' WHERE idkategori=$id";
         $db->runSql($sql);
       header("location:?f=kategori&m=select");
    echo $sql;
     }

    ?> 