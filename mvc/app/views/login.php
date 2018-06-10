<?php
    
    include_once 'header.php';
    session_start();
    /*
    if(isset($_SESSION['user_id'])){
         header("Location: ./404page.php");
         exit();
    }*/
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Transparent Login Form</title>
    <link rel="stylesheet" href="../../public/css/stylelogin.css">
</head>

<body>
    <div class="loginBox">
        <img src="../../public/Images/user.png" class="user">
        <h2>Log In</h2>
        <form class="nav-login" action="../controllers/controll_login.php" method="POST">
            <p>Username/Email</p>
            <input type="text" name="uid" placeholder="   Username/Email">
            <p>Password</p>
            <input type="password" name="pwd" placeholder="   ••••••••">

            <button type="submit" name="submit" >Log in</button>

            <a href="register.php">Create new account</a>
            <!--<a href="#">Forget Password</a> -->
        </form>
    </div>
</body>

</html>