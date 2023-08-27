<?php
session_start();
require 'db.php';
$errorPassword = "";
$errorEmail = "";
$email = "";
$pass = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = DB::getInstance();
    $conn = $db->getConnection();

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if (!$result) {
        $errorEmail = "The email you entered is not connected to an account.";
    } else {
        if (password_verify($pass, $result['PASSWORD'])) {

            $_SESSION['email'] = $email;
            $_SESSION['firstname'] = $result['firstname'];
            $_SESSION['lastname'] = $result['lastname'];
            header("Location: profile.view.php");
            exit;
        } else {
            $errorPassword = "The password you have entered is incorrect.";
        }
    }
}

?>