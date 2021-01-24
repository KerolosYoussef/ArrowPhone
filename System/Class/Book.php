<?php
    require_once "Database/Database.php";
    class Book extends Database{
        function __construct(){
            parent::__construct();
        }
        // function to book an appointment
        public function addAppointment($DocSpecID,$userID,$DocID,$fees,$Date,$Time){
            $sql = "INSERT INTO appointments (DoctorSpecializationID, UserID, DoctorID, consultancyFees, appointmentDate, appointmentTime,Creation_Date) Values(?,?,?,?,?,?,now())";
            return $this->insertRow($sql,[$DocSpecID,$userID,$DocID,$fees,$Date,$Time]);
        }
    }
    $book = new Book();
?>