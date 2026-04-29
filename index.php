<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db.php';

$result = $conn->query("SELECT * FROM brands");

$featured = $conn->query("SELECT * FROM watches WHERE featured = 1");

include 'index_view.php';
?>