<?php

session_start();

if(isset($_POST['submit'])){
    
    include_once '../models/db_connection.php';
    include_once '../models/insert_object.php';

    $count = 0;
    $name = mysqli_real_escape_string($conn,$_POST['objectname']);
    $type = mysqli_real_escape_string($conn,$_POST['type']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $time = mysqli_real_escape_string($conn,$_POST['time']);
    $question = mysqli_real_escape_string($conn,$_POST['question0']);

    
    if(empty($name) ||  empty($type) || empty($description) || empty($time) || empty($question) ){
        header("Location: ../views/topic.php?fields=empty");
        exit();
    }else{
        if(!is_numeric($time)){
            header("Location: ../views/topic.php?time=incorrect");
            exit();
        }else{
            if(strlen($name) > 255){
                header("Location: ../views/topic.php?name=toolong");
                exit();
            }  
            if(strlen($description) > 255){
                header("Location: ../views/topic.php?description=toolong");
                exit();
            }
            do {      
                if(strlen($question) > 255){
                    header("Location: ../views/topic.php?question=toolong");
                    exit();
                }
                $count++;
                $question = mysqli_real_escape_string($conn,$_POST['question' . $count]);

            } while ( !empty($question) );

            
            $object = insert_obj($name, $type, $description);
            $obj_user = insert_obj_user($object['object_id'], $_SESSION['user_id'], $time );
            // $_SESSION['object_id'] = $object['object_id'];        
            for($i = 0; $i < $count ; $i++){  
                $question = mysqli_real_escape_string($conn,$_POST['question' . $i]);
                $insert_q = insert_question($question, $object['object_id']);
            }
            
            header("Location: ../views/index.php?topic=success");
            exit();

        }
    }
}else{
    header("Location: ../views/topic.php?submit=error");
    exit();
}

?>