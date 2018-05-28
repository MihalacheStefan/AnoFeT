<?php

session_start();

if(isset($_POST['submit'])){

    include_once '../models/db_connection.php';
    include_once '../models/login_model.php';

    $uid = mysqli_real_escape_string($conn,$_POST['uid']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

    if( empty($uid) || empty($pwd) ){
        header("Location: ../views/login.php?login=empty");
        exit();
    } else {
        
        $loginAnswer = verify($uid , $pwd);

        if($loginAnswer == "false"){
            header("Location: ../views/login.php?login=error");
            exit();
        }else{
            $_SESSION['user_id'] = $loginAnswer['user_id'];
            $_SESSION['username'] = $loginAnswer['username'];
            $_SESSION['password'] = $loginAnswer['password'];
            
            header("Location: ../views/login.php?login=succes");// de fapt e home_auth
            exit();
        }

    }

}else{
    header("Location: ../views/login.php?login=error");
    exit();
}

mysqli_close($conn);

?>