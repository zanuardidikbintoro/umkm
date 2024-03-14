<?php

class DB{

   public $host ="127.0.0.1";
   private $user = "root";
   private $password = "";
   private $database = "dbfunfood";


   public function __construct()
   {
      echo 'function construct';
   } 


    public function selectData()
    {
        echo 'select data';
    }

        public function getDatabase()
        {
            echo $this->database;
        }

        public function tampil()
        {
            $this->selectData();
        }

        public static function insertData()
        {
           echo "static function";
        }
}

        DB::insertData();
    

        
        //$db = new DB;
        // $db->selectData();
        // $db->host;
        // echo $db->host;

        // echo '<br>';

        // $db->getDatabase();
        // $db->tampil();
   //var_dump($db);
?>