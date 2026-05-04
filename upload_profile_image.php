<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: SignIn.php");
    exit();
}

if (!isset($_FILES['profile_image']) || $_FILES['profile_image']['error'] !== UPLOAD_ERR_OK) {
    die("Upload failed. Error code: " . $_FILES['profile_image']['error']);
}

$user_id = $_SESSION['user_id'];

$folder = "profile_img/";

if (!is_dir($folder)) {
    mkdir($folder, 0755, true);
}

$originalName = $_FILES['profile_image']['name'];
$tempPath = $_FILES['profile_image']['tmp_name'];

$extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
$newName = "user_" . $user_id . "." . $extension;

$uploadPath = $folder . $newName;

if (!move_uploaded_file($tempPath, $uploadPath)) {
    die("Could not move uploaded file. Check folder permissions.");
}

$stmt = $conn->prepare("UPDATE users SET profile_image = ? WHERE id = ?");
$stmt->bind_param("si", $uploadPath, $user_id);
$stmt->execute();

header("Location: Account.php");
exit();
?>