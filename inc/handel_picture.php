<?php
$file = $_FILES['picture'];
$fileNmae = $file['name'];
$exp = explode('.', $fileNmae);
$fileExt = strtolower(end($exp));
$allowed = array('jpg', 'jpeg', 'png');
if (!in_array($fileExt, $allowed)) {
    $errorPicture = "you can't upload picture of this type.";

} else {
    if ($_FILES['picture']['error'] === 0) {
        if ($file['size'] < 1000000) {
            $picName = uniqid('', true) . "." . $fileExt;
            $picPath = '../uploads/' . $picName;
            move_uploaded_file($file['tmp_name'], $picPath);
        } else {
            $errorPicture = "Your picture size is too big!.";
        }

    } else
        $errorPicture = "There was an error uplpading your picture!.";

}