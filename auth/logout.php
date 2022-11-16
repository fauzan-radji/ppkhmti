<?php
session_start();
session_destroy();
session_unset();
$_SESSION['flashSucc'] = "Anda telah logout";
header("Location: login.php");
?>