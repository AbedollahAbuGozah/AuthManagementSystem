<?php

session_start();
require 'db.php';
$db = DB::getInstance();
$conn = $db->getConnection();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $firstname = $result['firstname'];
    $lastname = $result['lastname'];
    $picPath = $result['image'];


} else {
    header("Location: Not_found.php");
}
?>