<?php 
//if the user is set then go to index
session_start();
if (isset($_SESSION['user'])) {
    require 'views/content.view.php';
} else {
    header('location: index.php');
}


?>