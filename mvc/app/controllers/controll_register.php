<?php

session_start();

if(isset($_POST['submit'])){
    
    include_once '../models/db_connection.php';
    include_once '../models/insert_account.php';

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $uid_1 = mysqli_real_escape_string($conn,$_POST['uid']);
    $uid_2 = str_replace("<","?",$uid_1);
    $uid = str_replace(">","?",$uid_2);
    $pwd1 = mysqli_real_escape_string($conn,$_POST['pwd1']);
    $pwd2 = mysqli_real_escape_string($conn,$_POST['pwd2']);

    //errors

    if(empty($email) ||  empty($uid) || empty($pwd1) || empty($pwd2) ){
        header("Location: ../views/register.php?signup=empty");
        exit();
    } else {

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../views/register.php?signup=email");
            exit();
        } else {
            if(validate($uid) == "false"){
                header("Location: ../views/register.php?signup=usertaken");
                exit();
            }
            else{
                if($pwd1 != $pwd2){
                    header("Location: ../views/register.php?signup=password");
                    exit();
                }
                else{
                    $hashedPwd = password_hash($pwd1, PASSWORD_DEFAULT);

                    $insertAnswer = insert($uid , $email , $hashedPwd);

                    $_SESSION['user_id'] = $insertAnswer['user_id'];
                    $_SESSION['username'] = $insertAnswer['username'];
                    $_SESSION['email'] = $insertAnswer['email'];

                    header("Location: ../views/index.php?signup=succes");
                    exit();

                }
            }
        }

    }

} else{
    header("Location: ../views/register.php");
    exit();
}

mysqli_close($conn);

?>