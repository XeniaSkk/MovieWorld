<?php 

$host = "localhost"; 
$dbname = "movieworlddb";
$username = "root";
$password = "";

try {
    $con = new PDO("mysql:dbname=$dbname;host=$host", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>