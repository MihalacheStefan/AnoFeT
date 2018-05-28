<?php

if(isset($_POST['submit'])){
    
    include_once '../models/db_connection.php';
    include_once '../models/username_valid.php';
    include_once '../models/insert_account.php';

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $uid = mysqli_real_escape_string($conn,$_POST['uid']);
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
                    header("Location: ../views/register.php?signup=passwords");
                    exit();
                }
                else{
                    $hashedPwd = password_hash($pwd1, PASSWORD_DEFAULT);

                    $ceva = insert($uid , $email , $hashedPwd);

                    header("Location: ../views/register.php?signup=succes");
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