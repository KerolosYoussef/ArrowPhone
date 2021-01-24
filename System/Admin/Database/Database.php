<?php 
    require_once "Connection.php";
    class Database extends Connection{
        function __construct(){
            parent::__construct();
        }
        // function to get row from Database
        public function getRow($sql,$para = []){
            try{
                $stmt = $this->con->prepare($sql);
                $stmt->execute($para);
                return $stmt->fetch();
            } catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        // End getRow

        // function to get rows from Database
        public function getRows($sql,$para=[]){
            try{
                $stmt = $this->con->prepare($sql);
                $stmt->execute($para);
                return $stmt->fetchAll();
            } catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        // end getRows

        // function to insert row in Database
        public function insertRow($sql,$para=[]){
            try{
                $stmt = $this->con->prepare($sql);
                $stmt->execute($para);
                return true;
            } catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        // end inserRow

        // function to Update Row in Database
        public function updateRow($sql,$para=[]){
            $this->insertRow($sql,$para);
            return true;
        }
        // end Updata Function

        // function to Delete Row From Database
        public function deleteRow($sql,$para=[]){
            $this->insertRow($sql,$para);
            return true;
        }
        // end Delete Function

        // function to count table
        public function countRows($sql,$para = []){
            try{
                $stmt = $this->con->prepare($sql);
                $stmt->execute($para);
                return $stmt->fetch();
            } catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
    }