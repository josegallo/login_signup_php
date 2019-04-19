<?php 
//if the user is set then go to index
session_start();
if (isset($_SESSION['user'])) {
    header('location: index.php');
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //sanitize
    $user = filter_var(strtolower( $_POST['user']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $error = "";
    //validate no empty boxs
    if (empty($user) or empty($password) or empty($password2) ) {
        $error .= '<li>Please complete form</li>';
    } else {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=signup_login', 'root', '');
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }
        //Query in DB if user exits
        $statement = $conn->prepare('SELECT * FROM users WHERE user = :user LIMIT 1');
        $statement->execute(array(':user' => $user));
        $result = $statement->fetch();
        // var_dump($result);
        if ($result != false) {
            $error .= "<li>The user already exist</li>";
        } 
        //pass encryption
        $password = hash('sha512', $password);
        $password2 = hash('sha512', $password2);
        if ($password != $password2) {
            $error.= "<li>Passwords don't match</li>";
        }
    }
    if ($error =='') {
        $statement = $conn->prepare('INSERT INTO users (id, user, pass) VALUES (null, :user, :pass)');
        $statement->execute(array(':user' => $user, ':pass'=>$password));
        header('location: login.php');
    }
} 

require 'views/signup.view.php';

?>