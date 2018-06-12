<?php

function get_object_users($ceva){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $sql = "SELECT * from object_user where object_grade is null and questionnaire_grade is null and timeout < SYSDATE();";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        mysqli_close($conn);
        return $result;
    }

    mysqli_close($conn);
    return "ceva";

}

function create_object_grade($object_id){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $sql = "SELECT * from opinions where object_id = '$object_id';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        $grade = 0;
        $nr = 0;
        while($row = mysqli_fetch_assoc($result)){
            $grade = $grade + $row['opinion'];
            $nr++;
        }
        mysqli_close($conn);
        $rez = $grade / $nr;
        return $rez;
    }

    mysqli_close($conn);
    return 0;

}

function create_questionnaire_grade($object_id){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $sql = "SELECT * from questionnaire where object_id = '$object_id';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    $grade = 0;
    $nr = 1;
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            //pentru fiecare intrebare
            $question_id =  $row['question_id'];
            $question_grade = 0;
            echo " question id: " . $question_id . '<br>';
            $sql_q = "SELECT * from answers where question_id = '$question_id';";
            $result_q = mysqli_query($conn, $sql_q);
            $resultCheck_q = mysqli_num_rows($result_q);
            if($resultCheck_q > 0){
                while($row_q = mysqli_fetch_assoc($result_q)){
                    // pentru fiecare raspuns la intrebare
                    $answer = $row_q['answer'];
            
                    //interpretez answer -> modific question grade
                    $caut = strstr($answer, 'da');
                    
                    while(!empty($caut)){
                        $question_grade++;
                        $caut = strstr(substr($caut, 1), 'da');
                    }
                    
                    $caut = strstr($answer, 'nu');

                    while(!empty($caut)){
                        $question_grade--;
                        $caut = strstr(substr($caut, 1), 'nu');
                    }
                }
            }
            $grade = $grade + $question_grade; 
            
            $nr++;
        }
        mysqli_close($conn);
        $rez = $grade / $nr;
        return $rez;
    }

    mysqli_close($conn);
    return "ceva";

}

function update_grade($object_grade, $questionnaire_grade, $object_id){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
     $sql = "UPDATE object_user SET object_grade = '$object_grade', questionnaire_grade = '$questionnaire_grade' WHERE object_id = '$object_id' ;";

     mysqli_query($conn, $sql);

    mysqli_close($conn);
    return "ceva";

}

?>