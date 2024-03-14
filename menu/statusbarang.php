<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $row = $db->getITEM("SELECT * FROM tblmenu WHERE idmenu =$id");
        
        if ($row['aktif']==0) {
            $aktif = 1;
        }else{
            $aktif = 0;
        }

     
        $sql= "UPDATE tblmenu SET aktif=$aktif WHERE idmenu=$id";
        $db->runSql($sql);
        header("location:?f=menu&m=select");

    }

?>