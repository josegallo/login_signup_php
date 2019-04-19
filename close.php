<?php 
session_start();
//close the session
session_destroy();
//clean the session array
$_SESSION= array();
//redirect to login
header('location: login.php');
?>