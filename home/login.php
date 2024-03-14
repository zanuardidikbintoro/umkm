<div class="col-4 mx-auto mt-4">

<div class="form-group"> 
<form action="" method="POST">
<div>
    <h3>Login Pelanggan</h3>
</div>
<div class="form-group">
<label for="">Nama</label>
<input type="pelanggan" name="pelanggan" required class="form-control">
</div> 
<div class="form-group">
<label for="">Password</label>
<input type="password" name="password" required class="form-control">
</div> 
<div>
    <input type="submit" name="login" value="Masuk" class="btn btn-primary">
</div>
</form>
</div> -->

</div> -->
<?php

    if (isset($_POST['login'])) {
        $pelanggan= $_POST['pelanggan'];
        $password = hash('sha256',$_POST['password']);

        $sql = "SELECT * FROM tblpelanggan WHERE pelanggan='$pelanggan'";
        $count = $db->rowCount($sql);

        if ($count == 0) {
            echo "<h3><center>Mungkin Anda Belum Terdaftar</center></h3>
                    <h3> <center> Mohon Daftar Dahulu </center> </h3>";
        }else{
            $sql = "SELECT * FROM tblpelanggan WHERE pelanggan='$pelanggan'";
           $row = $db->getITEM($sql);

           $_SESSION['pelanggan'] = $row['pelanggan'];
           $_SESSION['idpelanggan'] = $row['idpelanggan'];
          

           header("location:index.php");
        }


    }

?>

<?php
    // session_start();
    // error_reporting(0);
    //     $user = array(
    //         "user"=>"demo",
    //         "pass"=>"demo"
    //     );

    // if (isset($_POST['submit'])) {
    //     if($_POST['username'] == $user['user'] && $_POST['password'] == $user['pass']){
    //         $_SESSION["username"] = $_POST['username'];
    //         echo "Anda berhasil login $_POST[username], Silakan Logout disini <a href=#> Klik</a>";

    //     }else{
    //         display_login_form();
    //         echo'<p> Username atau pass salah</p>';
    //     }
    //     }else{
    //         display_login_form();
    //     }
    //     function display_login_form(){
           
    //         <form action="<?php echo $_SERVER['PHP_SELF']?>" method='post'>
            <!-- <label for="username">username</label>
              <input type="text" name="username" id="username">
              <label for="password">password</label>
              <input type="password" name="password" id="password">
              <input type="submit" name="submit" value="submit"> -->
          <!-- </form> -->
         <!-- } -->
    <!-- ?> -->
        
<!--  -->
