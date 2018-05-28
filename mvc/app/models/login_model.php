<?php

function verify($uid , $pwd){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    
    $sql = "SELECT * FROM accounts WHERE username = '$uid' OR email = '$uid';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck < 1){
        mysqli_close($conn);
        return "false";
    }else{
        if($row = mysqli_fetch_assoc($result)){

            $hashedPwdCheck = password_verify($pwd , $row['password']);
            if($hashedPwdCheck == false){
                mysqli_close($conn);
                return "false";
            } elseif($hashedPwdCheck == true){
                mysqli_close($conn);
                return $row;
            }
        }
    }

    mysqli_close($conn);
    return "false";
}

?>