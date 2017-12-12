<?php
session_start();
session_unset($_SESSION['giohang']);
header("location:index.php");
?>