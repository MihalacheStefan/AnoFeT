<?php

function get_username($row){

    include_once '../models/get_objects.php';
    return get_username_m($row);
   
}

function get_time ($row){

    include_once '../models/get_objects.php';
    return get_time_m($row);
}


function get_objects ($ceva){

    include_once '../models/get_objects.php';
    return get_objects_m($ceva);
}


function get_objects_bygrade($ceva){

    include_once '../models/get_objects.php';
    return get_objects_bygrade_m($ceva);
}


function get_objects_withgrade($ceva){

    include_once '../models/get_objects.php';
    return get_objects_withgrade_m($ceva);
}

function get_current_grade($object_id){

    include_once '../models/get_objects.php';
    return get_current_grade_m($object_id);
}

function get_new_grade($q, $object_id){

    include_once '../models/get_objects.php';
    return get_new_grade_m($q, $object_id);
}

?>