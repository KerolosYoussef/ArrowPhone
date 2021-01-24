<?php
    require_once "Database/Database.php";
    class Appointment extends Database{
        function __construct(){
            parent::__construct();
        }
        // function to get all appointments
        public function getAppointments(){
            $sql = "SELECT * 
                    FROM appointments A INNER JOIN doctors D ON A.DoctorID = D.ID
                    INNER JOIN doctorspecialization S ON S.ID = DoctorSpecializationID INNER JOIN users U ON A.UserID = U.ID";
            return $this->getRows($sql);
        }
        // function to get The Appointments Data From Database
        public function getAllData($userID){
            $sql = "SELECT * 
                    FROM appointments A INNER JOIN doctors D ON A.DoctorID = D.ID
                    INNER JOIN doctorspecialization S ON S.ID = DoctorSpecializationID
                    WHERE UserID=?";
            return $this->getRows($sql,[$userID]);
        }
        public function getAllDataForDoctor($docID){
            $sql = "SELECT * 
                    FROM appointments A INNER JOIN doctors D ON A.DoctorID = D.ID
                    INNER JOIN doctorspecialization S ON S.ID = DoctorSpecializationID INNER JOIN users U ON U.ID = A.UserID  
                    WHERE DoctorID=?";
            return $this->getRows($sql,[$docID]);
        }
        // function to Cancel an Appointment
        public function cancelAppointment($AppointmentId){
            $sql = "DELETE FROM appointments WHERE A_ID = ?";
            return $this->deleteRow($sql,[$AppointmentId]);
        }
    }
    $apt = new Appointment();
?>