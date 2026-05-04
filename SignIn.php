<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'db.php';

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows === 1){
        session_start();
        $user = $result->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        if($user['role'] === 'Admin'){
            header("Location: admin.php");
            exit();
        } else {
            header("Location: index.php");
            exit();
        }

    } else{
        header("Location: SignIn.php?error=1");
        exit();
    }
}

include 'SignIn_view.php';
?>