<?php

    // include_once 'header.php';
    /*$date_c = date('d/m/Y H:i:s');
    $date = date_create($date_c);
    $ore = 1;
    date_modify($date, '+' .$ore .' hour');
    $date_w = date_format($date, 'Y-m-d H:i:s') ;
    echo $date_w , "<br>";

    echo strtotime("now"), "<br>";
    echo strtotime($date_c), "<br>";
    echo strtotime($date_w), "<br>";
    */

    //echo str_replace("<>","",$text), "<br>";
   // echo $text;

    //echo strtotime("10 September 2000"), "<br>";
    //echo strtotime("+1 day"), "<br>";
    //echo strtotime("+1 week"), "<br>";
    //echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br>";
    //echo strtotime("next Thursday"), "<br>";
    //echo strtotime("last Monday"), "<br>";
    session_start();
/*
    include_once '../models/model_create_grade.php';

       
            
                //pentru fiecare obiect vad daca a trecut timpul
                $result = get_object_users("ceva");
                while($row = mysqli_fetch_assoc($result)){
                    $date_current = date('Y-m-d H:i:s');
                    $object_time = $row['timeout'];

                    if(strtotime($date_current) >= strtotime($object_time)){
                        //creez nota
                        $object_id = $row['object_id'];
                        $object_grade = create_object_grade($object_id);
                        $questionnaire_grade = create_questionnaire_grade($object_id);
                        
                        
                        // modific tabela
                        // $upp = update_grade($object_grade, $questionnaire_grade, $object_id);
                        
                    }
                   
                }

                //$sleep = mt_rand(5, 10);
                //sleep($sleep);
*/
            echo '<br><br><br><br><br><br>';

            $date_current = date('Y-m-d H:i:s');
            $date = date_create($date_current);
            $time = -48;
            date_modify($date, '+' .$time .' hour');
            $date_insert = date_format($date, 'Y-m-d H:i:s') ;

            echo strtotime($date_insert) . "<br>" . strtotime($date_current);

/*
            //$questionnaire_grade = create_questionnaire_grade("4");
            //echo $questionnaire_grade;

            //$upp = update_grade("10", "10", "1");
        
?>


<!--
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Stats Yuuuuuhuu</title>
        <link rel="stylesheet" href="../../public/css/styleTopic.css">

    </head>

    <body>
        <div class="container">
            <div class="container__item landing-page-container">
                <div class="content-wrapper">

                <header class="header">
                <div class="menu-icon header__item">
                <span class="menu-icon__line"></span>
                </div>

                <h1 class="heading header__item">STATISTICS</h1>




                </header>


                <div class="ellipse-container">





                <h2 class="greeting">TOPICSTAT</h2>
                <div class="ellipse ellipse__outer--thin">
                <div class="ellipse ellipse__orbit"></div>
                </div>
                <div class="ellipse ellipse__outer--thick"></div>

                <h2 class="heading header__item">Total stars : *** </h2>
                <h5 class="heading header__item">''</h5>
                <h6 class="heading header__item">''</h6>
                <h3 class="heading header__item">Total votes : *** </h3>
                <h7 class="heading header__item">''</h7>
                <h8 class="heading header__item">''</h8>
                <h4 class="heading header__item">Time elapsed: *** </h4>


                </div>
                </div>
            </div>
        </div>
    </body>

</html>


-->