<?php require '../inc/signup.php';
session_start();
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
    <link rel="stylesheet" href="../style/index.css">
</head>

<body>

    <nav>
        <a type="button" href="signin.view.php">Sign in</a>
    </nav>
    <div class="container">
        <h1>Sign Up</h1>
        <form action="<?php echo htmlspecialchars("index.php") ?>" method="POST" enctype="multipart/form-data">

            <label for="in1">First Name:</label>
            <span class="star" style="color:red;">*</span>
            <input type="text" name="firstname" id="in1" required value="<?= $firstname ?>">
            <span class="star" style="color:red;">*</span>
            <?php echo '<span class = "error">' . $errorFirst . '</span>' ?>


            <label for="in2">Last Name:</label>
            <input type="text" name="lastname" id="in2" required value="<?= $lastname ?>">
            <span class="star" style="color:red;">*</span>
            <?php echo '<span class = "error">' . $errorLast . '</span>' ?>


            <label for="in3">Email:</label>
            <input type="text" name="email" id="in3" required value="<?= $email ?>">
            <span class="star" style="color:red;">*</span>
            <?= '<span class = "error">' . $errorEmail . '</span>' ?>

            <label for="in4">Password:</label>
            <input type="password" name="password1" id="in4" required value="<?= $pass1 ?>">
            <span class="star" style="color:red;">*</span>
            <?= '<span class = "error">' . $errorPass1 . '</span>' ?>


            <label for="in5">Confirm Password:</label>
            <input type="password" name="password2" id="in5" required value="<?= $pass2 ?>">
            <span class="star" style="color:red;">*</span>
            <?= '<span class ="error">' . $errorPass2 . '</span>' ?>


            <label for="picture">Picture:</label>
            <input type="file" name="picture" id="picture" required>
            <?= '<span class = "error">' . $errorPicture . '</span>' ?>
            <input type="submit" id="submit" value="Submit">

        </form>
    </div>
</body>

</html>