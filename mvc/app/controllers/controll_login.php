<?php

session_start();

if(isset($_POST['submit'])){

    include_once '../models/db_connection.php';
    include_once '../models/login_model.php';

    $uid_1 = mysqli_real_escape_string($conn,$_POST['uid']);
    $uid_2 = str_replace("<","?",$uid_1);
    $uid = str_replace(">","?",$uid_2);
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
            $_SESSION['email'] = $loginAnswer['email'];
            
            header("Location: ../views/index.php?login=succes");// de fapt e home_auth
            exit();
        }

    }

}else{
    header("Location: ../views/login.php?login=error");
    exit();
}

mysqli_close($conn);

?>