<?php

    $obj_id = $row['object_id'];
    $sql_obj_user = "SELECT * FROM accounts a JOIN object_user ou ON a.user_id = ou.user_id JOIN objects obj ON obj.object_id = ou.object_id 
                     WHERE obj.object_id = '$obj_id';";
    $result_obj_user = mysqli_query($conn, $sql_obj_user);
    $resultCheck_obj_user = mysqli_num_rows($result_obj_user);

    if($row_obj_user = mysqli_fetch_assoc($result_obj_user)){
        echo $row_obj_user['username'];
    }

?>