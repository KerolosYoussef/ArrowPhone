<?php
    require_once "Database/Database.php";
    class Contact extends Database{
        function __construct(){
            parent::__construct();
        }
        public function addContact($name,$email,$mobileNumber,$desc){
            $sql = "INSERT INTO contact_us (Full_Name, Email,contact_no, Message, Posting_Date, isRead) VALUES (?,?,?,?,now(),0)";
            return $this->insertRow($sql,[$name,$email,$mobileNumber,$desc]);
        }
        // function to get contact us messages from database
        public function getMessages(){
            $sql = "SELECT * FROM contact_us WHERE isRead = 0";
            return $this->getRows($sql);
        }
        public function getReadedMessages(){
            $sql = "SELECT * FROM contact_us WHERE isRead = 1";
            return $this->getRows($sql);
        }
        // function to get certain contact us message from database
        public function getCertainMessages($id){
            $sql = "SELECT * FROM contact_us WHERE ID = ?";
            return $this->getRow($sql,[$id]);
        }
        // function to update read status
        public function markAsRead($id){
            $sql = "UPDATE contact_us SET isRead = 1 WHERE ID = ?";
            return $this->updateRow($sql,[$id]);
        }
    }
    $contact = new Contact();
?>