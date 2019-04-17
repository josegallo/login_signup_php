<!DOCTYPE html>
<html lang="en">
<head>
    <meta chraset= "UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, 
    initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title> Sign Up </title>
</head>
<body>
    <div class="container">
        <h1 class="title">Sign up</h1>
        <hr class="border">
        <form class = "form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "POST" name="login">
            <div class="form-group">
                <i class="icon left fa fa-user"></i><input type="text" name = "user" class="user" placeholder = "user">
            </div>
            <div class="form-group">
                <i class="icon left fa fa-lock"></i><input type="password" name = "passwword" class="password" placeholder = "passwword">
            </div>
            <div class="form-group">
                <i class="icon left fa fa-lock"></i><input type="password" name = "password2" class="password_btn" placeholder = "Repeat password">
                <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
            </div>
        </form>
    <p class="text-signup">
        ¿Already and account?
        <a href="login.php">Login</a>
    </p>
    </div>
</body>
</html>