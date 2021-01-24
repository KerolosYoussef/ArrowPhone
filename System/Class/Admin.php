<?php
    require_once "Database/Database.php";
    class Admin extends Database{
        function __construct(){
            parent::__construct();
        }
        // Authentication Function 
        public function Authentication($username,$pass){
            $sql = "SELECT * FROM Admin WHERE Username = ? AND Password = ?";
            return $this->getRow($sql,[$username,$pass]);
        }
        // function to count table in database
        public function countTable($tableName){
            $sql = 'SELECT COUNT(*) as tbl_count FROM '.$tableName;
            return $this->countRows($sql);
        }
        // function to get all data of doctors
        public function getAllDoctorsData(){
            $sql = "SELECT D.ID,S.Specialization,D.Name,D.RegisterDate FROM Doctors D
                    INNER JOIN doctorspecialization S ON D.SpecializationID = S.ID";
            return $this->getRows($sql);
        }
        // function to add contact message to database
        public function addContact($name,$email,$mobileNumber,$desc){
            $sql = "INSERT INTO contact_us (Full_Name, Email,contact_no, Message, Posting_Date, isRead) VALUES (?,?,?,?,now(),0)";
            return $this->insertRow($sql,[$name,$email,$mobileNumber,$desc]);
        }
        // function to get contact us messages from database
        public function getMessages(){
            $sql = "SELECT * FROM contact_us";
            return $this->getRows($sql);
        }
        // function to get certain contact us message from database
        public function getCertainMessages($id){
            $sql = "SELECT * FROM contact_us WHERE ID = ?";
            return $this->getRows($sql,[$id]);
        }
        // function to get all patients data
        public function getAllDataofPatient($Name){
            $sql = "SELECT * FROM Patients WHERE Patient_Name = ?";
            return $this->getRow($sql,[$Name]);
        }
    }
    $admin = new Admin();
?>