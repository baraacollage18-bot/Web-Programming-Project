<?php
session_start();
include 'db.php';

if (!isset($_GET['id'])) {
    die("No watch selected");
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("
    SELECT watches.*, brands.name AS brand_name
    FROM watches
    JOIN brands ON watches.brand_id = brands.id
    WHERE watches.id = ?
");

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$watch = $result->fetch_assoc();

if (!$watch) {
    die("Watch not found");
}

include 'WatchPage_view.php';
?>