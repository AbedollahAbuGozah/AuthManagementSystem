<?php require '../inc/profile.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="../style/profile.css">

</head>

<body>
    <nav>
        <h1>Profile Page</h1>
        <a href="../logout.php">Log Out</a>
    </nav>
    <div class="container">
        <a href="edit.view.php" class="edit">Edit Info</a>
        <img src="<?= $picPath ?>" alt="Profile Picture">
        <div>
            <label for="firstname">First Name:</label>
            <span id="firstname">
                <?= $firstname ?>
            </span>
            <label for="lastname">Last Name:</label>
            <span id="lastname">
                <?= $lastname ?>
            </span>
            <label for="email">Email:</label>
            <span id="email">
                <?= $email ?>
            </span>
        </div>
    </div>
</body>

</html>