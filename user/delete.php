<?php

if (isset($_GET['id'])) {
    $id=$_GET['id'];

    $sql = "DELETE FROM tbluser WHERE iduser=$id";

  
    $db->runSql($sql);
       header("location:?f=user&m=select");
    
       
}



?>