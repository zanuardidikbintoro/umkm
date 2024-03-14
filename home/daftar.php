<?php

$sql = "SELECT max(id) as maxID from tblpelanggan ";
$row =  $db->runSql($sql);
$code = $row['maxID'];
$urutan = (int)substr($code, 1, 3);
$urutan++;
$huruf = "P";
$nopesan = $huruf . sprintf("%03s", $urutan);
?>

<h1>Registrasi Pelanggan</h1><br>



<!-- <div class="form-group"> 
    <form action="" method="POST">
    <div class="form-group w-50">
        <label for="">Nama Pelanggan</label>
        <input type="text" name="pelanggan" required placeholder="Daftarkan Nama Anda" class="form-control">
        </div>   -->
        <!-- <div class="form-group w-50">
        <label for="">Alamat</label>
        <input type="text" name="alamat" required placeholder="Masukkan Alamat" class="form-control">
        </div> 
        <div class="form-group w-50">
        <label for="">Telepon</label>
        <input type="number" name="telp" required placeholder="Masukkan Nomor Telepon" class="form-control">
        </div> 
        <div class="form-group w-50">
        <label for="">Email</label>
        <input type="email" name="email" required placeholder="Masukkan Email" class="form-control">
        </div>  -->
        <!-- <div class="form-group w-50">
        <label for="">No Pesan</label>
        <input type="number" name="number" value="<?php echo $nopesan ?>" readonly class="form-control">
        </div>  -->
        <!-- <div class="form-group w-50">
        <label for="">Konfirmasi Password</label>
        <input type="password" name="konfirmasi" required placeholder="password" class="form-control">
        </div>  -->
       <!-- <div> 
           <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div> 
    </form>
</div> -->

 <?php

    // if (isset($_POST['simpan'])) {
    //    $pelanggan= $_POST['pelanggan'];
       //$nopesan = $_POST['nopesan']
        // $alamat= $_POST['alamat'];
        // $telp= $_POST['telp'];
        // $email = $_POST['email'];
         //$password = hash('sha256',$_POST['password']);
         // $konfirmasi = hash('sha256',$_POST['konfirmasi']);
  
        
       //if($nopesan === $nopesan){
       //$sql="INSERT INTO tblpelanggan VALUES('','$pelanggan',$nopesan)";

    //       $db->runSql($sql);
    //       header("location:f=home&m=login ");
    //   }else{
    //      echo "<h2>Ulangi Password</h2>";
    //   }
      
    // ?>
   