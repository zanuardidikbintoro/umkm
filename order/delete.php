<?php

if (isset($_GET['id'])) {
    $id=$_GET['id'];

    $sql = "DELETE FROM tblorder WHERE idorder=$id";

  
    $db->runSql($sql);
       header("location:?f=order&m=select");
    
       
}



?>