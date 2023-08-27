<?php
session_start();
require 'db.php';
$db = DB::getInstance();
$conn = $db->getConnection();
$errorFirst = "";
$errorLast = "";
$errorPass = "";
$errorPicture = "";
$massageFirstname = "";
$massageLastname = "";
$massagePw = "";
$massagePic = "";

if (!isset($_SESSION['email'])) {
    header("Location:Not_found.php");
}
function checkValidation($key, $value)
{
    global $errorFirst, $errorLast, $errorPass;
    switch ($key) {
        case "password": {
                if (strlen($value) < 8 and strlen($value) !== 0) {

                    $errorPass = "Password should be at least 8 characters long.";
                }
            }
            break;
        case "email": {
                if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
                    $errorEmail = "email is not a valid email address.";
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
function manipulate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_SESSION['email']))
    $email = manipulate($_SESSION['email']);
else
    header("Location:Not_found.php");
if (isset($_POST['password'])) {

    $pass = manipulate($_POST['password']);
    $sql = "UPDATE user SET PASSWORD=? WHERE email = ?";
    checkValidation("password", $pass);
    if (empty($errorPass) && !empty($pass)) {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $pass, $email);
        $massagePw = "Password updated successfully.";
        $stmt->execute();
    }
}
if (isset($_POST['firstname'])) {

    $firstname = $_POST['firstname'];
    $sql = "UPDATE user SET firstname=? WHERE email = ?";
    checkValidation("firstname", $firstname);
    if (empty($errorFirst) && !empty($firstname)) {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $firstname, $email);
        $_SESSION['firstname'] = $firstname;
        $massageFirstname = "Firstname updated successfully.";
        $stmt->execute();
    }
}
if (isset($_POST['lastname'])) {

    $lastname = manipulate($_POST['lastname']);
    $sql = "UPDATE user SET lastname=? WHERE email = ?";
    checkValidation("lastname", $lastname);
    if (empty($errorLast) && !empty($lastname)) {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $lastname, $email);
        $stmt->execute();
        $massageLastname = "Lastname updated successfully.";
        $_SESSION['lastname'] = $lastname;
    }
}

if (isset($_FILES['picture']['name'])) {
    echo "DSF";
    require 'handel_picture.php';
    if (empty($errorPicture) and !empty($_FILES['picture'])) {
        $sql = "UPDATE user SET image=? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $picPath, $email);
        $stmt->execute();
        $massagePic = "Lastname updated successfully.";

    }

}

?>