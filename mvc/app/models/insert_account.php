<?php

function insert($uid, $email, $hashedPwd){

     $dbServername = "localhost";
     $dbUsername = "root";
     $dbPassword = "";
     $dbName = "baza_date";
     $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
     if (mysqli_connect_errno()){

         echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }

    $sql = "INSERT INTO accounts (username, email, password ) VALUES ('$uid', '$email', '$hashedPwd');";
    mysqli_query($conn , $sql);

    mysqli_close($conn);

    return "ceva";
}

?>