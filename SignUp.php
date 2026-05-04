<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'db.php';

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $rePassword = $_POST['rePassword'] ?? '';
    $phoneNumber = $_POST['phoneNumber'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $country = $_POST['country'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email format";
    } elseif ($password != $rePassword) {
        $msg = "Passwords do not match";
    } elseif (!ctype_digit($phoneNumber)) {
        $msg = "Phone number must contain numbers only";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, phone, gender, country) VALUES (?, ?, ?, ?, ?, ?)");

        if ($stmt) {
            $stmt->bind_param("ssssss", $username, $email, $password, $phoneNumber, $gender, $country);

            if ($stmt->execute()) {
                $msg = "Account created successfully";
            } else {
                $msg = "Database error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $msg = "Prepare error: " . $conn->error;
        }
    }
}
include 'SignUp_view.php';
?>