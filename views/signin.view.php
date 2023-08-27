<?php

require '../inc/signin.php';
if (isset($_SESSION['email'])) {
    header("Location:profile.view.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEMO</title>
    <link rel="stylesheet" href="../style/signin.css">


<body>
    <nav>
        <a href="index.php">Sign Up</a>
    </nav>
    <div class="container">

        <h1>Sign In</h1>

        <form action="signin.view.php" method="POST">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required value="<?= $email ?>">
            <?= '<span class = "error">' . $errorEmail . '</span>' ?>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required value="<?= $pass ?>">
            <?= '<span class="error">' . $errorPassword . '</span>' ?>
            <input type="submit" value="Sign In">
        </form>
    </div>
</body>

</html>