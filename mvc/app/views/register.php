<!doctype html>
<html>
    <head>
        <meta charset ="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="../../public/css/styleregister.css">
        </head>
    <body>
        <div class="registerBox">
            <img src="../../public/Images/user.png" class="user">
            <h2>Register here</h2>
            <form class="signup-form" action="../controllers/controll_register.php" method="POST">
                <p>Email</p>
                <input type="text" name="email" placeholder="Enter Email">
                <p>Username</p>
                <input type="text" name="uid" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="pwd1" placeholder="••••••">
                <p>Retype Password</p>
                <input type="password" name="pwd2" placeholder="••••••">

                <button type="submit" name="submit" >Create New Account </button>
                <!--<a href="#">I'm agree with the terms and conditions</a> -->
                <p> By clicking Create New Account, you agree to our Terms
                </p>
            </form>
        </div>

    </body>


</html>