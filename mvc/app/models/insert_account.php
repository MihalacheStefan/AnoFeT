<?php

function validate($uid){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


   $sql = "SELECT * FROM accounts WHERE username = '$uid';";
   $result = mysqli_query($conn, $sql);
   $resultCheck = mysqli_num_rows($result);

   mysqli_close($conn);

   if($resultCheck > 0){
       return "false";
   }
   return "true";

}

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

    $sql = "SELECT * FROM accounts WHERE username = '$uid' ;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    mysqli_close($conn);

    if($row = mysqli_fetch_assoc($result)){
        return $row;
    }
    
    
    return "ceva";
}

?>