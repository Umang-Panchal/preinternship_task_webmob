<?php
session_start(); 
session_destroy();
header("location:../LMS/admin_login.php"); 
?>
