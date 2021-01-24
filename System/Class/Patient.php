<?php
    require_once 'Database/Database.php';
    class Patient extends Database{
        function __construct(){
            parent::__construct();
        }
        // function to get all patients
        public function getPatients(){
            $sql = "SELECT * FROM Patients";
            return $this->getRows($sql);
        }
        // function to add new patient
        public function addPatient($docID,$name,$cnum,$email, $gender, $address, $age,$mhistroy){
            $sql = 'INSERT INTO patients (Doc_ID, Patient_Name, Patient_Contact, Patient_Email, Patient_Gender, Patient_Address, Patient_Age, Patient_mHistory, Creation_Date)
                    VALUES (?,?,?,?,?,?,?,?,NOW())';
            return $this->insertRow($sql,[$docID, $name, $cnum, $email, $gender, $address, $age, $mhistroy]);
        }
        // function check if the patient already exists
        public function isExist($email,$docID){
            $sql = 'SELECT * FROM Patients WHERE Patient_Email = ? AND Doc_ID = ?';
            return $this->getRow($sql,[$email,$docID]);
        }
        // function to get All The Data
        public function getAllData($docID){
            $sql = 'SELECT * FROM Patients WHERE Doc_ID = ?';
            return $this->getRows($sql,[$docID]);
        }
        // function to get specific patient data
        public function getSpecificData($patientID){
            $sql = "SELECT * FROM Patients WHERE ID = ?";
            return $this->getRow($sql,[$patientID]);
        }
         // function to get specific patient data
        public function getAllDataofPatient($docID,$Name){
            $sql = "SELECT * FROM Patients WHERE Doc_ID = ? AND Patient_Name = ?";
            return $this->getRow($sql,[$docID,$Name]);
        }
        // function to Update a patient Data
        public function updatePatient($name,$cnum,$email, $gender, $address, $age,$mhistroy, $patientID){
            $sql = "UPDATE Patients SET Patient_Name = ?, Patient_Contact=?, Patient_Email=?, Patient_Gender=?, Patient_Address=?, Patient_Age=?, Patient_mHistory=?
                    WHERE ID = ?";
            return $this->updateRow($sql,[$name,$cnum,$email, $gender, $address, $age,$mhistroy, $patientID]);
        }
    }
    $patient = new Patient();
?>