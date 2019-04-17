<?php 
session_start();
if (isset($_SESSION['user'])) {
    header('location: contenido.php');
} else {
    header('location: signup.php');
}
?>