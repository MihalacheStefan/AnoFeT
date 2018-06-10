<?php

    $obj_id = $row['object_id'];
    $sql_obj_time = "SELECT * FROM object_user WHERE object_id = '$obj_id';";

    $result_obj_time = mysqli_query($conn, $sql_obj_time);
    $resultCheck_obj_time = mysqli_num_rows($result_obj_time);

    if($row_obj_time = mysqli_fetch_assoc($result_obj_time)){
        echo $row_obj_time['timeout'];
    }

?>