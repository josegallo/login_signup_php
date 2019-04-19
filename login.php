<?php 

//if the user is set then go to index
session_start();
if (isset($_SESSION['user'])) {
    header('location: index.php');
} 
//define error variable to show in errors
$error ='';
//check if POST was sent
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = filter_var(strtolower( $_POST['user']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = hash('sha512',$password);
    
    try {
        $conn = new PDO('mysql:host=localhost;dbname=signup_login','root','');
        
    } catch (PDOException $e) {
        echo 'Error : ' . $e->getMessage();
    }
    //check if user and password are correct
    $statement = $conn->prepare(
        'SELECT * FROM users WHERE user =:user AND pass = :pass'
    );
    $result = $statement->execute(array(':user'=>$user, ':pass'=>$password));
    $result = $statement->fetch();
    //if user and pass match then go to conten else return error
    if ($result==true) {
        $_SESSION[user]=$user;
        header('location: content.php');
    } else {
        $error .= "<li>The user and password not valid</li>";
    }

}
require 'views/login.view.php';

?>