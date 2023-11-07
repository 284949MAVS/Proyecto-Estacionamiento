<?php
session_start();

session_destroy();

header("Location: loginPague.php");
exit();
?>
