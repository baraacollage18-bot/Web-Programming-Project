<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Admin') {
    header("Location: SignIn.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $watch_id = $_POST['watch_id'];
    $stock = $_POST['stock'];

    $stmt = $conn->prepare("UPDATE watches SET stock = ? WHERE id = ?");
    $stmt->bind_param("ii", $stock, $watch_id);
    $stmt->execute();

    $message = "Stock updated successfully.";
}

$stmt = $conn->prepare("
    SELECT watches.id, watches.name, watches.stock, brands.name AS brand_name
    FROM watches
    JOIN brands ON watches.brand_id = brands.id
    ORDER BY brands.name, watches.name
");

$stmt->execute();
$watches = $stmt->get_result();

include 'admin_view.php';
?>