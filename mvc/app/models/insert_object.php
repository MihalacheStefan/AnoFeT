<?php

function insert_obj($name, $type, $description){
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "INSERT INTO objects (name, type, description ) VALUES ('$name', '$type', '$description');";
    mysqli_query($conn , $sql);

    $sql = "SELECT * FROM objects WHERE name = '$name' and type = '$type' and description = '$description';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    mysqli_close($conn);

    if($row = mysqli_fetch_assoc($result)){
        return $row;
    }

    return "ceva";
}

function insert_obj_user($object_id, $user_id, $time){
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "INSERT INTO object_user (object_id, user_id, timeout ) VALUES ('$object_id', '$user_id', '$time');";
    mysqli_query($conn , $sql);


    mysqli_close($conn);


    return "ceva";
}

function insert_question($question, $object_id){
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "INSERT INTO questionnaire (question, object_id ) VALUES ('$question', '$object_id');";
    mysqli_query($conn , $sql);

    mysqli_close($conn);


    return "ceva";
}

?>