<?php
session_start();
session_destroy();
?>
<?php
header("Location:views/signin.view.php");
?>