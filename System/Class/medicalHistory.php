<?php
    require_once "Database/Database.php";
    class medicalHistory extends Database{
        function __construct(){
            parent::__construct();
        }
        // function to Add Medical History
        public function addMedical($id,$bp,$bs,$weight,$bt,$Prescription){
            $sql = "INSERT INTO medicalHistory (Patient_ID, BloodPressure, BloodSugar, Weight, Temprature, MedicalPres, Creation_Date)
                    VALUES (?,?,?,?,?,?,NOW())";
            return $this->insertRow($sql,[$id,$bp,$bs,$weight,$bt,$Prescription]);
        }
        // function to get all Data
        public function getAllData($patientID){
            $sql = "SELECT * FROM medicalhistory WHERE Patient_ID = ?";
            return $this->getRows($sql,[$patientID]);
        }
    }
    $MH = new medicalHistory();
?>