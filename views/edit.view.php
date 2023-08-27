<?php require '../inc/edit.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEMO</title>
    <link rel="stylesheet" href="../style/edit.css">
</head>

<body>
    <nav>
        <a href="profile.view.php">Profile Page</a>
    </nav>
    <div class="container">
        <form method="POST" enctype="multipart/form-data">

            <label for="firstname">First name:</label>
            <input type="text" name="firstname" id="firstname" value="<?= $_SESSION['firstname'] ?>">
            <span class="error">
                <?= $errorFirst ?>
            </span>
            <span class="success"
                style=" background-color: #d4edda;  color: #155724 ; border: 0px solid #c3e6cb;  border-radius: 4px;">
                <?= $massageFirstname ?>
            </span>

            <label for="lastname">Last name:</label>
            <input type="text" name="lastname" id="lastname" value="<?= $_SESSION['lastname'] ?>">
            <span class="error">
                <?= $errorLast ?>
            </span>
            <span class="success "
                style=" background-color: #d4edda;  color: #155724;    border: 0px solid #c3e6cb;  border-radius: 4px;">
                <?= $massageLastname ?>
            </span>

            <label for="edit-pass">Password:</label>
            <input type="password" name="password" id="edit-pass">
            <span class="error">
                <?= $errorPass ?>
            </span>
            <span class="success "
                style=" background-color: #d4edda;  color: #155724;    border: 0px solid #c3e6cb;  border-radius: 4px;">
                <?= $massagePw ?>
            </span>

            <label for="edit-photo">Change Photo:</label>
            <input type="file" name="picture" id="edit-photo">


            <button type="submit">Submit Changes</button>
        </form>
    </div>
</body>

</html>