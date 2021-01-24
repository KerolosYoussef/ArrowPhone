<?php
    class Connection{
        protected $isConnected = false;
        protected $con;

        function __construct($dbName = "hospital_mangement_system", $host = "localhost", $username = 'root', $pass = 'root', $options = []){
            try{
                $this->con = new PDO("mysql:host={$host};dbname={$dbName};charset=utf8",$username,$pass,$options);
                $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                echo "Connected Successfully"; //(For Debbuging only);
            } catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
?>