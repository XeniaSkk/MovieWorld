<?php
class Account {
    private $con;
    private $errorArray = array();

    public function __construct($con) {
        $this->con = $con;
    }

    public function register($usname, $psw, $psw2) {
        $this->validateUsername($usname);
        $this->validatePasswords($psw, $psw2);

        if(empty($this->errorArray)) {
            return $this->insertUserDetails($usname, $psw);
        }
        else {
            return false;
        }
    }

    public function login($usname, $psw) {
        $psw = hash("sha512", $psw);

        $query = $this->con->prepare("SELECT * FROM users WHERE username=:usname AND password=:psw");
        $query->bindParam(":usname", $usname);
        $query->bindParam(":psw", $psw);
        $query->execute();

        if($query->rowCount() == 1) {
            return true;
        }
        else {
            array_push($this->errorArray, "Your username or password was incorrect");
            return false;
        }
    }

    public function insertUserDetails($usname, $psw) {
        
        $psw = hash("sha512", $psw);

        $query = $this->con->prepare("INSERT INTO users (username, password) VALUES(:usname, :psw)");

        $query->bindParam(":usname", $usname);
        $query->bindParam(":psw", $psw);
        
        return $query->execute();
    }

    private function validateUsername($usname) {
        if(strlen($usname) > 25 || strlen($usname) < 5) {
            array_push($this->errorArray, "Your username must be between 5 and 25 characters");
            return;
        }

        $query = $this->con->prepare("SELECT username FROM users WHERE username=:usname");
        $query->bindParam(":usname", $usname);
        $query->execute();

        if($query->rowCount() != 0) {
            array_push($this->errorArray, "This username already exists");
        }

    }

    private function validatePasswords($psw, $psw2) {
        if($psw != $psw2) {
            array_push($this->errorArray, "Your passwords do not match");
            return;
        }

        if(preg_match("/[^A-Za-z0-9]/", $psw)) {
            array_push($this->errorArray, "Your password can only contain letters and numbers");
            return;
        }

        if(strlen($psw) > 30 || strlen($psw) < 5) {
            array_push($this->errorArray, "Your password must be between 5 and 30 characters");
        }
    }

    public function getError($error) {
        if(in_array($error, $this->errorArray)) {
            return "<span class='errorMessage'>$error</span>";
        }
    }



}













?>