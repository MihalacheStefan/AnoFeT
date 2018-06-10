<?php

function get_objects_m($ceva){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    // ar trebui sa scot obiectele care au deja nota
    $sql = "SELECT * from objects order by object_id desc;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        mysqli_close($conn);
        return $result;
    }

    mysqli_close($conn);
    return "ceva";

}

function get_username_m($row){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $obj_id = $row['object_id'];
    $sql_obj_user = "SELECT * FROM accounts a JOIN object_user ou ON a.user_id = ou.user_id JOIN objects obj ON obj.object_id = ou.object_id 
                     WHERE obj.object_id = '$obj_id';";
    $result_obj_user = mysqli_query($conn, $sql_obj_user);
    $resultCheck_obj_user = mysqli_num_rows($result_obj_user);

    if($row_obj_user = mysqli_fetch_assoc($result_obj_user)){
        mysqli_close($conn);
        return $row_obj_user['username'];
    }

    mysqli_close($conn);
    return "ceva";
}

function get_time_m($row){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $obj_id = $row['object_id'];
    $sql_obj_time = "SELECT * FROM object_user WHERE object_id = '$obj_id';";

    $result_obj_time = mysqli_query($conn, $sql_obj_time);
    $resultCheck_obj_time = mysqli_num_rows($result_obj_time);

    if($row_obj_time = mysqli_fetch_assoc($result_obj_time)){
        mysqli_close($conn);
        return $row_obj_time['timeout'];
    }

    mysqli_close($conn);
    return "ceva";
}
    
function get_objects_bygrade_m($ceva){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "SELECT * from objects o join object_user u on o.object_id = u.object_id order by object_grade desc limit 5;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        mysqli_close($conn);
        return $result;
    }

    mysqli_close($conn);
    return "ceva";

}

function get_objects_withgrade_m($ceva){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "SELECT * from objects o join object_user u on o.object_id = u.object_id where object_grade is not null ;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        mysqli_close($conn);
        return $result;
    }

    mysqli_close($conn);
    return "ceva";

}

function get_current_grade_m($object_id){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "SELECT * from opinions where object_id = '$object_id' ;";
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
    return "ceva";

}

function get_new_grade_m($q, $object_id){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "baza_date";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()){

        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "SELECT * from opinions where object_id = '$object_id' ;";
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
        $grade = $grade + $q;
        $nr++;
        $rez = $grade / $nr;
        return $rez;
    }else{
        mysqli_close($conn);
        return $q;
    }

    return "ceva";

}

?>