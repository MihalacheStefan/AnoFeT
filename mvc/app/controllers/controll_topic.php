<?php

session_start();

if(isset($_POST['submit'])){
    
    include_once '../models/db_connection.php';
    include_once '../models/insert_object.php';

    $count = 0;
    $name_1 = mysqli_real_escape_string($conn,$_POST['objectname']);
    $name_2 = str_replace("<","?",$name_1);
    $name = str_replace(">","?",$name_2);
    $type = mysqli_real_escape_string($conn,$_POST['type']);

    $description_1 = mysqli_real_escape_string($conn,$_POST['description']);
    $description_2 = str_replace("<","?",$description_1);
    $description = str_replace(">","?",$description_2);

    $time = mysqli_real_escape_string($conn,$_POST['time']);
    $question_1 = mysqli_real_escape_string($conn,$_POST['question0']);
    $question_2 = str_replace("<","?",$question_1);
    $question = str_replace(">","?",$question_2);

    
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
                $question_1 = mysqli_real_escape_string($conn,$_POST['question' . $i]);
                $question_2 = str_replace("<","?",$question_1);
                $question = str_replace(">","?",$question_2);
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