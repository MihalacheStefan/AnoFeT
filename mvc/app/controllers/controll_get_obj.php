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
?>