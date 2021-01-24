<?php
    require_once "Database/Database.php";
    class User extends Database{
        function __construct(){
            parent::__construct();
        }
        // function to register new user
        public function Register($fname,$addr,$gender,$uname,$email,$password){
            $sql = "INSERT INTO users
                    (Full_Name,Address,Gender,Username,Email,Password,RegisterDate)
                    VALUES (?, ?, ?, ?, ? ,? , NOW())";
            return $this->insertRow($sql,[$fname,$addr,$gender,$uname,$email,$password]);
        }
        // function to check if this user is exists or not
        public function isExist($uname,$email){
            $sql = "SELECT * FROM users WHERE Username = ? OR Email = ?";
            return $this->getRow($sql,[$uname,$email]);
        }
        // function to check login data exists or not
        public function checkLogin($username,$password){
            $sql = "SELECT * FROM users WHERE Username = ? AND Password = ? ";
            return $this->getRow($sql,[$username,$password]);
        }
        // function to Reset Password Check
        public function checkReset($Email,$uname){
            $sql = "SELECT * FROM users WHERE Email = ? AND Username= ?";
            return $this->getRow($sql,[$Email,$uname]);
        }
        // function to Update The Password in the Database 
        public function updatePassword($password,$username){
            $sql = "UPDATE users SET Password = ? WHERE Username = ?";
            $this->updateRow($sql,[$password,$username]);
        }
        // function to get The User Data From Database
        public function getAllData($username){
            $sql = "SELECT * FROM users WHERE Username = ?";
            return $this->getRow($sql,[$username]);
        }
        // function to get the user data from database by id
        public function getAllUsers(){
            $sql = "SELECT * FROM users";
            return $this->getRows($sql);
        }
        // function to Update User Data
        public function UpdateProfile($username,$Adress,$Gender,$email,$uname){
            $sql = "UPDATE users SET  Username = ?, Address= ? , Gender = ? , Email = ? WHERE Username = ?";
            return $this->updateRow($sql,[$username,$Adress,$Gender,$email,$uname]);
        }
        // function to Dete User
        public function DeleteUser($userId){
            $sql = "DELETE FROM Users WHERE ID = ?";
            return $this->deleteRow($sql,[$userId]);
        }
    }
    $user = new User();
?>