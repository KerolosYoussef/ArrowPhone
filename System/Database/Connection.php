<?php
    class Connection{
        protected $isConnected = false;
        protected $con;

        function __construct($dbName = "Hospital_Mangement_System", $host = "127.0.0.1", $username = 'root', $pass = 'root', $options = []){
            $this->isConnected = true;
            try{
                $this->con = new PDO("mysql:host={$host};dbname={$dbName};charset=utf8",$username,$pass,$options);
                $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                // echo "Connected Successfully" (For Debbuging only);
            } catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
    }
    //$connection = new Connection() (For Debbuging only);
?>