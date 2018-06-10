<?php

session_start();

if(isset($_POST['submit'])){

    include_once '../models/db_connection.php';
    include_once '../models/chestionar_model.php';

    $user_id = $_SESSION['user_id'];
    $object_id = $_POST['submit'];
    
    $nrQuestions = nr_questions($object_id);
    var_dump($nrQuestions);

    for($i=1 ; $i<=$nrQuestions ; $i++)
    {
        $answer = mysqli_real_escape_string($conn,$_POST['question' . $i]);
        
        if( empty($answer) ){
            header("Location: ../views/index.php?feedback=empty");
            exit();
        }
        if(strlen($answer) > 255){
            header("Location: ../views/index.php?feedback=toolong");
            exit();
        }
    }
    if(verify_user($object_id, $user_id) == false){
        header("Location: ../views/index.php?feedback=already_made");
        exit();
    }

    $sql = "SELECT * from questionnaire where object_id = '$object_id' order by question_id asc;";
	$result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $count=1;

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            $answer = mysqli_real_escape_string($conn,$_POST['question' . $count]);
            $question_id = $row['question_id'];
            $count++;

            $insert = insert_answer($question_id, $answer);
        }
    }

    $opinion = $_POST['opinion'];
    $insert = insert_opinion($opinion , $object_id, $user_id);

    header("Location: ../views/index.php?feedback=succes");
    exit();

}else{
    header("Location: ../views/chestionar.php?submit=error");
    exit();
}
