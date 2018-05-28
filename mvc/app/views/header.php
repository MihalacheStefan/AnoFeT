<!DOCTYPE html>
<html>
    <head>

            <link rel="stylesheet" href="../../public/css/style.css" />

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

            <title>AnoFet: The anonymous feedbacker</title>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="../../public/script/script2.js"></script>

    </head>
    
    <body>

        <div class="header">
            <div class="header-content"> 

                <a href="#default" class="logo">
                    <img src="../../public/Images/anofet.png" alt="logo">
                </a>

                <div class="header-right">
                    <?php
                         if(isset($_SESSION['user_id'])){
                                echo '<a class="active nav-link nav-link-ltr" href="index.php">Home</a>
                                <a class="nav-link nav-link-ltr" href="Topic.php">Create a TOPIC</a>
                                <a class="nav-link nav-link-ltr" href="Stats.php">Stats</a>
                                <a class="nav-link nav-link-ltr" href="../controllers/controll_logout.php">Log out</a>';
                         }else{
                             echo ' <a class="active nav-link nav-link-ltr" href="index.php">Home</a>
                             <a class="nav-link nav-link-ltr" href="login.php">Log in</a>
                             <a class="nav-link nav-link-ltr" href="register.php">Register</a>
                             <a class="nav-link nav-link-ltr" href="Stats.php">Stats</a>';
                         }

                    ?>
                    
                     

                   
                </div>

            </div>


        </div>
