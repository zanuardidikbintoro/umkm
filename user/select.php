<?php
    $jumlahdata = $db->rowCount("SELECT iduser FROM tbluser");
    $banyak = 3;
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])){
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    }else {
        $mulai = 0;
    }

    $sql="SELECT * FROM tbluser ORDER BY user ASC LIMIT $mulai,$banyak";
    $row = $db->getAll($sql);

    $no=1+$mulai;
?>



<h2>Data User</h2> <br>
<a  class ="btn btn-primary" href="?f=user&m=insert" role="button">Tambah Data</a> <br>



<table class="table table-bordered w-70">
   <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Email</th>
            <th>Level</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
   </thead>

   <tbody>
    <?php foreach($row as $r): ?>
        <?php
            if ($r['aktif']==1) {
                $status = "Aktif";
            }else{
                $status = "BANNED";
            }

        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['user']?></td>
            <td><?php echo $r['email']?></td>
            <td><?php echo $r['level']?></td>
            <td><a href="?f=user&m=update&id=<?php echo $r['iduser']?>"><?php echo $status ?></a></td>
            <td> <a href="?f=user&m=delete&id=<?php echo $r['iduser']?>">Delete</a></td>
        </tr>
        <?php endforeach ?>
   </tbody>
</table>


<?php
    for($i=1; $i <= $halaman ; $i++){
        echo '<a href="?f=user&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>