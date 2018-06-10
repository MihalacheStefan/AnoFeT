<?php
    include_once 'controll_get_obj.php';
    session_start();
    $q = intval($_GET['q']);
    $obj_id = $_SESSION['object'];
    
    $grade = get_new_grade($q, $obj_id);
    
    echo "<p>The new grade will be: " . $grade . "</p>";
    
?>