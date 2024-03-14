

<script>window.print</script>
<?php

require_once "dbcontroller.php";
$db = new DB;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
</head>
<body>
<?php
  if (isset($_GET['idorder'])) {
    $id=$_GET['idorder'];
  }
    $sql="SELECT * FROM vorderdetail WHERE idorder=$id ORDER BY idorderdetail ";
    $row = $db->getAll($sql);
?>
    <center>
        <h2>FUNFOOD</h2>
        <h2>Shelter Kuliner Kutoarjo</h2>
    </center>
    

    <center>
    <table class="table table-bordered w-70">
   <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
        </tr>
        </thead>
        <tbody>
        <?php if(!empty($row)){ ?>
    <?php foreach($row as $r): ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['tglorder']?></td>
            <td><?php echo $r['menu']?></td>
            <td><?php echo $r['harga']?></td>
            <td><?php echo $r['jumlah']?></td>
            
           
            
        </tr>
        <?php endforeach ?>
        <?php } ?>
    </tbody>
  

</table>
</center>

</body>
</html>