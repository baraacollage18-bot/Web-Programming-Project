<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db.php';
session_start();

if (!isset($_GET['id'])) {
    die("No brand selected");
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("
    SELECT watches.*, brands.name AS brand_name
    FROM watches
    JOIN brands ON watches.brand_id = brands.id
    WHERE brands.id = ?
");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

$watches = [];
$brandName = "";

while ($row = $result->fetch_assoc()) {
    $watches[] = $row;
    $brandName = $row['brand_name'];
}

include 'Watches_view.php';
?>