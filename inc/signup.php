<?php
require 'db.php';
$db = DB::getInstance();
$conn = $db->getConnection();
$errorEmail = "";
$errorFirst = "";
$errorLast = "";
$errorPass1 = "";
$errorPass2 = "";
$errorPicture = "";
$pass1 = "";
$pass2 = "";
$email = "";
$firstname = "";
$lastname = "";
function manipulate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function isValid($key, $value)
{
    global $errorEmail, $errorFirst, $errorLast, $errorPass1, $errorPass2, $errorPicture, $conn;
    switch ($key) {
        case "password": {
                if (strlen($value) < 8) {

                    $errorPass1 = "Password should be at least 8 characters long.";
                }
            }
            break;
        case "email": {
                if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
                    $errorEmail = "email is not a valid email address.";
                } else {
                    $sql = "SELECT * FROM user WHERE email = '$value'";
                    $stmt = $conn->query($sql);
                    if (mysqli_num_rows($stmt) > 0) {
                        $errorEmail = "User already exists. Please try another one.";

                    }



                }
            }
        case "firstname": {

                if (preg_match('/^[0-9]/', $value)) {
                    $errorFirst = "name should not started with neumirce value";
                }

            }
        case "lastname": {
                if (preg_match('/^[0-9]/', $value)) {
                    $errorLast = "name should not started with neumirce value";
                }

            }


    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass1 = manipulate($_POST['password1']);
    $pass2 = manipulate($_POST['password2']);
    $email = manipulate($_POST['email']);
    $firstname = manipulate($_POST['firstname']);
    $lastname = manipulate($_POST['lastname']);
    
    require 'handel_picture.php' ;
    
    isValid("password", $pass1);
    isValid("email", $email);
    isValid("firstname", $firstname);
    isValid("lastname", $lastname);
    if ($pass1 !== $pass2) {
        $errorPass2 = "Passwords do not match.";
    }
    if (empty($errorFirst) && empty($errorLast) && empty($errorEmail) && empty($errorPass1) && empty($errorPass2) && empty($errorEmpty) && empty($errorPicture)) {

        $sql = "INSERT INTO user (firstname, lastname, email, password, image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $hashPwInDb = password_hash($pass1, PASSWORD_DEFAULT);
        $stmt->bind_param("sssss", $firstname, $lastname, $email, $hashPwInDb, $picPath);
        $stmt->execute();
        header("Location: signin.view.php");
        exit();

    }
}

?>