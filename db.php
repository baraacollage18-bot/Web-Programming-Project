<?php
$host = "localhost";
$user = "root";
$pass = "636072";
$dbname = "watchshop";

$conn = new mysqli($host, $user, $pass, $dbname);

if($conn->connect_error) {
    die("Connnection faild: " . $conm->connect_error);
}
?>