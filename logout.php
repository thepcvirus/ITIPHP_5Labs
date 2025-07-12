<?php 
session_start();
unset($_SESSION["islogged"]);
$_SESSION["islogged"] = "false";

header("Location: login.php");
