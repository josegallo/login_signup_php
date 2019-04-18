<?php 
session_start();
if (isset($_SESSION['user'])) {
    header('location: index.php');
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = filter_var(strtolower( $_POST['user']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    // echo "$user . $password . $password2";

    $error = "";
    if (empty($user) or empty($password) or empty($password2) ) {
        $error .= '<li>Please complete form</li>';
    } else {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=signup_login', 'root', '');
            print "conn";
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }
        echo $user . 'into';
        $statement = $conn->prepare('SELECT * FROM users WHERE user = :user LIMIT 1');
        $statement->execute(array(':user' => $user));
        $result = $statement->fetch();
        // var_dump($result);
        if ($result != false) {
            $error .= "<li>The user already exist</li>";
        }
    }
} 

require 'views/signup.view.php';


?>