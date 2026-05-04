<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: SignIn.php");
    exit();
}

if (!isset($_POST['item_id'])) {
    die("No item selected");
}

$item_id = (int) $_POST['item_id'];

$stmt = $conn->prepare("DELETE FROM cart_item WHERE id = ?");
$stmt->bind_param("i", $item_id);
$stmt->execute();

header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>