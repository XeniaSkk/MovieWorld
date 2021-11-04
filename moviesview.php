<?php
class Moviesview {
    private $con;
    public function __construct($con) {
        $this->con = $con;
    }

    public function moviesItems($con) {
        $query = $this->con->prepare("SELECT * FROM movies ORDER BY id DESC");
        $query->execute();

        return $query;
    }















    }