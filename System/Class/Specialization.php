<?php
    require_once "Database/Database.php";
    class Specialization extends Database{
        function __construct(){
            parent::__construct();
        }
        // function to get The User Data From Database
        public function getAllData(){
            $sql = "SELECT * FROM doctorspecialization";
            return $this->getRows($sql);
        }
        // function to add specialization
        public function addSpec($spec){
            $sql = "INSERT INTO doctorspecialization (Specialization,Creation_Date) VALUES (?,NOW())";
            return $this->insertRow($sql,[$spec]);
        }
    }
    $Specialization = new Specialization();
?>