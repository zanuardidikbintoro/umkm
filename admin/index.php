<?php

    session_start();

    require_once "../dbcontroller.php";
    $db = new DB;

    if (!isset($_SESSION['user'])) {
        header("location:login.php");
    }

    if (isset($_GET['log'])) {
        session_destroy();
        header ("location:index.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page | Funfood</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
     <div class="container">
        
            <div class="row mt-4">
                <div class="col-md-3">
                  <h2>Admin Page</h2>
                <h2>Funfood</h2>
                </div>
            
                <div class="col-md-9">
                    <div class="float-right mt-4"> <a href="?log=logout">Logout</a> </div>
                    <div class="float-right mt-4 mr-4">User : <a href="?f=user&m=updateuser&id=<?php echo $_SESSION['iduser']?>"> 
                    <?php echo $_SESSION['user'] ?></a></div>
                    <div class="float-right mt-4 mr-4"> Level : <?php echo $_SESSION['level']?></div>


                    <?php
//cek menu kosong
$sql="select * from tblmenu where stok=0";
$row = $db->getAll($sql);
$jum=$db->rowCount($sql);
if($jum>0){
?>


                    <div class="float-right mt-4 mr-4">
                    <div class="dropdown">
  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Notifikasi <span class="badge badge-danger"><?=$jum;?></span>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <?php if(!empty($row)){ ?>
    <?php foreach($row as $r): ?>
    <a class="dropdown-item" href="index.php?f=menu&m=update&id=<?=$r['idmenu'];?>">Stok <b><?php echo $r['menu']?> </b>habis</a>
    <?php endforeach ?>
        <?php } ?>

  </div>
</div>
</div><?php } ?>

                </div>
                </div>

            <div class="row mt-2">
                <div class="col-md-3">
                 
                    <ul class="nav flex-column">

                    <?php

                    $level = $_SESSION['level'];
                    switch ($level) {
                        case 'admin':
                           echo '
                        <li class="nav-item"> <a class="nav-link" href="?f=kategori&m=select"> Kategori </a></li>
                        <li class="nav-item"><a class="nav-link" href="?f=menu&m=select">Menu</a></li>
                     
                        <li class="nav-item"><a class="nav-link" href="?f=order&m=select">Order</a></li>
                        <li class="nav-item"><a class="nav-link" href="?f=orderdetail&m=select">Order Detail</a></li>
                        <li class="nav-item"><a class="nav-link" href="?f=user&m=select">User</a></li>
                        
                        ';
                            break;

                        case 'owner':
                                echo '
                             <li class="nav-item"> <a class="nav-link" href="?f=kategori&m=select"> Kategori </a></li>
                             <li class="nav-item"><a class="nav-link" href="?f=menu&m=select">Menu</a></li>
                             <li class="nav-item"><a class="nav-link" href="?f=pelanggan&m=select">Pelanggan</a></li>
                             <li class="nav-item"><a class="nav-link" href="?f=order&m=select">Order</a></li>
                             <li class="nav-item"><a class="nav-link" href="?f=orderdetail&m=select">Order Detail</a></li>
                             <li class="nav-item"><a class="nav-link" href="?f=user&m=select">User</a></li>
                             
                             ';
                                 break;

                        case 'kasir':
                            echo '
                           
                            <li class="nav-item"><a class="nav-link" href="?f=order&m=select">Order</a></li>
                            <li class="nav-item"><a class="nav-link" href="?f=orderdetail&m=select">Order Detail</a></li>
                            ';
                            break;
                            
                        case 'koki':
                                echo '
                                
                                <li class="nav-item"><a class="nav-link" href="?f=orderdetail&m=select">Order Detail</a></li>
                                ';
                                break;
                        
                        default:
                         echo 'Tidak Ada Menu';
                            break;
                    }

                    ?>


                        
                        
                    </ul>
                </div>
                <div class="col-md-9">
                    <?php

                        if (isset($_GET['f']) && isset($_GET['m'])) {
                            $f=$_GET['f'];
                            $m =$_GET['m'];

                            $file = '../'.$f.'/'.$m.'.php';

                            require_once $file;
                        }
                    ?>
                </div>
            </div>

           

            <div class="row mt-5">
            <div class="col">
                <p class="text-center"> copyright Aninda </p>
            </div>

            </div>


     </div>

    
</body>
</html>