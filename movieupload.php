<?php
class movieUpload {
    private $con;
    private $errorArray = array();
    

    public function __construct($con) {
        $this->con = $con;
    }

    public function upload($title, $description, $user) {
        $this->validateTitle($title);
        $this->validateDescriptio($description);

        if(empty($this->errorArray)) {
            return $this->insertmovie($title, $description, $user);
        }
        else {
            return false;
        }
    }

    private function validateTitle($title) {
        if(strlen($title) > 20 || strlen($title) < 1) {
            array_push($this->errorArray, "Your Title must be between 1 and 20 characters");
            return;
        }

    }
    private function validateDescriptio($description) {
        if(strlen($description) > 1000 || strlen($description) < 1) {
            array_push($this->errorArray, "Your Description must be between 1 and 1000 characters");
            return;
        }

    }

    public function insertmovie($title, $description, $user) {

        $query = $this->con->prepare("INSERT INTO movies (title, description, user) VALUES(:title, :description, :user)");

        $query->bindParam(":title", $title);
        $query->bindParam(":description", $description);
        $query->bindParam(":user", $user);
        return $query->execute();
    }

    public function getError($error) {
        if(in_array($error, $this->errorArray)) {
            return "<span class='errorMessage'>$error</span>";
        }
    }



}













?>