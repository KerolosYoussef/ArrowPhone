<?php
    require_once "Database/Database.php";
    class Doctor extends Database{
        function __construct(){
            parent::__construct();
        }
        // Authentication Function 
        public function Authentication($username,$pass){
            $sql = "SELECT * FROM doctors WHERE Name = ? AND Password = ?";
            return $this->getRow($sql,[$username,$pass]);
        }
        // function to get all doctors
        // function to add new doctor
        public function addDoctor($docSpec,$docName,$addr, $fees, $num,$email,$pass){
            $sql = "INSERT INTO doctors (SpecializationID, Name, Address, DocFees, ContactNo, Email, Password, RegisterDate)
                    VALUES(?,?,?,?,?,?,?,NOW())";
            return $this->insertRow($sql,[$docSpec,$docName,$addr,$fees,$num,$email,$pass]);
        }
        // function to get The User Data From Database
        public function getAllData($DocID){
            $sql = "SELECT * FROM doctors WHERE ID = ?";
            return $this->getRow($sql,[$DocID]);
        }
        // function to get the data of the doctor by name
        public function getData($Name){
            $sql = "SELECT * FROM doctors WHERE Name = ?";
            return $this->getRow($sql,[$Name]);
        }
        // function to get Doctors of certain Specialization
        public function getSpecData($specID){
            $sql = "SELECT * FROM doctors WHERE SpecializationID = ?";
            return $this->getRows($sql,[$specID]);
        }
        // function to update doctor profile
        public function updateProfile($specId,$dname,$address,$fees,$cnum,$email,$doctor){
            $sql = "UPDATE Doctors SET SpecializationID = ?, Name = ?, Address = ?, DocFees = ?, ContactNo = ?, Email = ? WHERE Name = ?";
            return $this->updateRow($sql,[$specId,$dname,$address,$fees,$cnum,$email,$doctor]);
        }
        // function to Update The Password in the Database 
        public function updatePassword($password,$username){
            $sql = "UPDATE doctors SET Password = ? WHERE Name = ?";
            $this->updateRow($sql,[$password,$username]);
        }
        public function deleteDoctor($id){
            $sql = "DELETE FROM Doctors WHERE ID = ?";
            return $this->deleteRow($sql,[$id]);
        }
    }
    $doc = new Doctor();
?>