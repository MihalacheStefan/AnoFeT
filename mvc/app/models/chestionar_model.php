<?php

function nr_questions($object_id){
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "SELECT count(question_id) from questionnaire where object_id = '$object_id';";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);

    if($row = mysqli_fetch_assoc($result)){
        return $row['count(question_id)'];
    }

    return "ceva";
}

function insert_answer($question_id , $answer){
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "INSERT INTO answers (question_id, answer ) VALUES ('$question_id', '$answer');";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);

    return "ceva";
}

function insert_opinion($opinion , $object_id){
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "INSERT INTO opinions (opinion, object_id ) VALUES ('$opinion', '$object_id');";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);

    return "ceva";
}
?>