<?php 
session_start();
//if the user is set then go to content
if (isset($_SESSION['user'])) {
    header('location: content.php');
} else { //if the user is not set go to signup
    header('location: signup.php');
}
?>