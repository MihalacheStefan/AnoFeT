<?php

function get_types_m($ceva){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    

    $sql = "SELECT * from objects o join object_user u on o.object_id = u.object_id where u.object_grade is not null and u.questionnaire_grade is not null order by o.object_id desc;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        mysqli_close($conn);
        return $result;
    }

    mysqli_close($conn);
    return "ceva";

}

?>