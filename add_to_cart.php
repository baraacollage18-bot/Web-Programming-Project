<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: SignIn.php");
    exit();
}

if (!isset($_POST['watch_id'])) {
    die("No watch selected");
}

$user_id = $_SESSION['user_id'];
$watch_id = (int) $_POST['watch_id'];

$quantity = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 1;

if ($quantity < 1) {
    $quantity = 1;
}

$stmt = $conn->prepare("SELECT id FROM cart WHERE user_id = ? LIMIT 1");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $cart = $result->fetch_assoc();
    $cart_id = $cart['id'];
} else {
    $stmt = $conn->prepare("INSERT INTO cart (user_id) VALUES (?)");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $cart_id = $conn->insert_id;
}

$stmt = $conn->prepare("SELECT id, quantity FROM cart_item WHERE cart_id = ? AND watch_id = ?");
$stmt->bind_param("ii", $cart_id, $watch_id);
$stmt->execute();
$itemResult = $stmt->get_result();

if ($itemResult->num_rows === 1) {
    $item = $itemResult->fetch_assoc();

    $newQty = $item['quantity'] + $quantity;

    $stmt = $conn->prepare("UPDATE cart_item SET quantity = ? WHERE id = ?");
    $stmt->bind_param("ii", $newQty, $item['id']);
    $stmt->execute();
} else {
    $stmt = $conn->prepare("INSERT INTO cart_item (cart_id, watch_id, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $cart_id, $watch_id, $quantity);
    $stmt->execute();
}

header("Location: WatchPage.php?id=" . $watch_id);
exit();
?>