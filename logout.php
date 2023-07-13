<?php
require 'oop1.php';
// if(!empty($_SESSION["id"])){
$_SESSION = [];
session_unset();
session_destroy();
echo "<script> alert('Logout Successful'); </script>";
header("Location: login.php");


?>
