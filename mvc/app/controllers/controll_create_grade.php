<?php

function creare_nota($ceva){

    include_once '../models/model_create_grade.php';

                    //pentru fiecare obiect vad daca a trecut timpul
                    $result = get_object_users("ceva");
                    while($row = mysqli_fetch_assoc($result)){
                        $date_current = date('d/m/Y H:i:s');
                        $object_time = $row['timeout'];

                        if(strtotime($date_current) >= strtotime($object_time)){
                            //creez nota
                            $object_id = $row['object_id'];
                            $object_grade = create_object_grade($object_id);
                            $questionnaire_grade = create_questionnaire_grade($object_id);

                            // modific tabela
                            $upp = update_grade($object_grade, $questionnaire_grade, $object_id);
                        }
                    }


    return "ceva";
}
?>