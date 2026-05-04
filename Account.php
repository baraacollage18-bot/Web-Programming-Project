<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: SignIn.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$message = "";
$editMode = isset($_GET['edit']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $gender = trim($_POST['gender']);
    $country = trim($_POST['country']);

    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    if (!empty($new_password)) {
        $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $passRow = $stmt->get_result()->fetch_assoc();

        if (!$passRow || $old_password !== $passRow['password']) {
            $message = "Old password is incorrect.";
            $editMode = true;
        } else {
            $stmt = $conn->prepare("
                UPDATE users
                SET username = ?, email = ?, gender = ?, country = ?, password = ?
                WHERE id = ?
            ");
            $stmt->bind_param("sssssi", $username, $email, $gender, $country, $new_password, $user_id);
            $stmt->execute();

            header("Location: Account.php?updated=1");
            exit();
        }
    } else {
        $stmt = $conn->prepare("
            UPDATE users
            SET username = ?, email = ?, gender = ?, country = ?
            WHERE id = ?
        ");
        $stmt->bind_param("ssssi", $username, $email, $gender, $country, $user_id);
        $stmt->execute();

        header("Location: Account.php?updated=1");
        exit();
    }
}

if (isset($_GET['updated'])) {
    $message = "Account updated successfully.";
}

$stmt = $conn->prepare("
    SELECT id, username, email, gender, country
    FROM users
    WHERE id = ?
");

$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User not found");
}

include 'Account_view.php';
?>