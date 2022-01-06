<?php
session_start();
unset($_SESSION['sesi']);
unset($_SESSION['idpemilik']);
session_destroy();
header("Location:login.php");
?>