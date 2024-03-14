
<h3>Keranjang Belanja</h3>
<br><br>
<?php
$cekantri="select * from tblorder order by idorder DESC";
$hitung=$db->rowCount($cekantri);
$idor=$db->getITEM($cekantri);
//echo "hitung=$hitung";
if($hitung==0) {$nomor=1;}
else{
$nomor=$idor['idorder'];}
?>



<div class="badge-info p-1 text-center h4">Nomor Pesanan <b><?=$nomor+1;?></b></div>
<?php


if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    unset($_SESSION['_'.$id]);
    $hps="delete from stoktemp where idmenu=$_GET[hapus]";
    $qq=$db->runSql($hps);
   header("location:?f=home&m=beli");
}

    if (isset($_GET['tambah'])) {
        
        $id = $_GET['tambah'];
       $_SESSION['_'.$id]++;
       $add="update stoktemp set tambah=tambah+1 where idmenu=$_GET[tambah]";
       $qq=$db->runSql($add);

   
  
    }


    if (isset($_GET['kurang'])) {
        $id = $_GET['kurang'];
       $_SESSION['_'.$id]--;
       $add="update stoktemp set tambah=tambah-1 where idmenu=$_GET[kurang]";
       $qq=$db->runSql($add);
       if ($_SESSION['_'.$id]==0) {
        $hps="delete from stoktemp where idmenu=$_GET[kurang]";
    $qq=$db->runSql($hps);
        unset($_SESSION['_'.$id]);
       }
    }



 
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            isi($id);
            header("location:?f=home&m=beli");
             
        }else{
            keranjang();
        }
    


  
   

    function isi($id){
        if (isset($_SESSION['_'.$id])) {
            $_SESSION['_'.$id]++;
         }else{
             $_SESSION['_'.$id]=1;
         }
    }

    function keranjang(){
        global $db;
        $total = 0;
        global $total;

        echo'      
        <table class="table table-striped table-bordered w-70">
        
    <tr>
        <th>Menu</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Stok</th>
        <th>Sisa</th>
        <th>Hapus</th>
    </tr>

';




        foreach ($_SESSION as $key => $value) {
            if($key<>'pelanggan' && $key<>'idpelanggan' && $key<>'user' && $key<>'level' && $key<>'iduser'){
                $id= substr($key,1);
                $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";
                $row=$db->getAll($sql);

                $querystok="insert into stoktemp(idmenu) values($id)";
                $qq=$db->runSql($querystok);

                foreach ($row as $r) {
                  
                    echo '<tr>';
                    echo '<td>'. $r['menu'].'</td>';
                    echo '<td>' .Rupiah($r['harga']).'</td>';
                    echo '<td>';
                    $cekstok="select * from tblmenu where idmenu=$r[idmenu]";
                    $jum=$db->getITEM($cekstok);
                    echo '&nbsp &nbsp <a class="btn btn-sm btn-danger" href="?f=home&m=beli&kurang='.$r['idmenu'].'"> - </a>&nbsp;&nbsp;';
                    if ($_SESSION['_'.$id]>$jum['stok']-1) {
                     echo $jum['stok'];
             
                    }
                    elseif($jum['stok']==1){
                        echo "1";
                    }
                    else{
                      
                   echo $value;
                   echo '&nbsp;&nbsp;<a class="btn btn-sm btn-success" href="?f=home&m=beli&tambah='.$r['idmenu'].'"> +</a> &nbsp &nbsp';
                    }
              echo '</td>';
                    $jadi=$r['harga'] * $value;
                    echo '<td>' .Rupiah($jadi).'</td>';  
                    $stok= "update stoktemp set stok='$r[stok]' where idmenu=$id";
                    $qq=$db->runSql($stok);
                    echo "<td>$r[stok]</td>";
                    $stokbaru="select * from stoktemp where idmenu=$id";
                    $stoknew=$db->getITEM($stokbaru);
                   
                    $stoknew=$stoknew['stok']-$stoknew['tambah']-1;

                    $updstokbaru="update stoktemp set stokbaru=$stoknew where idmenu=$id";
                    $sq=$db->runSql($updstokbaru);

                  
                    echo "<td>$stoknew</td>";
                    echo '<td> <a class="btn btn-sm btn-danger" href="?f=home&m=beli&hapus='.$r['idmenu'].'">Hapus</a></td>';
                    echo '</tr>';
                    $total= $total + ($value * $r['harga']);
                    
                }
                
            }
            
        }

  
        echo '<tr>
            <td colspan=6><h3>Grand Total :</h3></td>
            <td><h3>'.Rupiah($total).'</h3></td>
         </tr>';
 echo '</table>';
    }

    ?>
    <?php
            function Rupiah ($angka){
                $hasil = "Rp".number_format($angka,2,',','.');
                return $hasil;
            }
            ?>
   <?php
   
    if (!empty($total)) {

    ?>

<a class="btn btn-primary" href="?f=home&m=pesan&total=<?php echo $total ?>&no=<?=$nomor;?>" role="button" name="pesan">Pesan</a>

        <?php
    }
    ?>

