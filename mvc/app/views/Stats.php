<?php

/*
            $date_current = date('Y-m-d H:i:s');
            $date = date_create($date_current);
            $time = -48;
            date_modify($date, '+' .$time .' hour');
            $date_insert = date_format($date, 'Y-m-d H:i:s') ;

            echo strtotime($date_insert) . "<br>" . strtotime($date_current);
            */
            include_once '../controllers/controll_stats.php';
?>

<!DOCTYPE html>
<html>
    <head>
            
            <link rel="stylesheet" href="../../public/css/stylestats.css" />

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

            <title>AnoFet: The anonymous feedbacker</title>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="./script/script2.js"></script>

    </head>

    <body>

        <div class="header">
            <div class="header-content"> 

                <a href="#default" class="logo">
                    <img src="../../public/Images/anofet.png" alt="logo">
                </a>

                <div class="header-right">
                    <a class="active nav-link nav-link-ltr" href="">Statistics for this category:</a>
                    <a class="nav-link nav-link-ltr" href="">HTML</a>
                    <a class="nav-link nav-link-ltr" href="">JSON</a>
                    <a class="nav-link nav-link-ltr" href="">CSV</a>
                    <a class="nav-link nav-link-ltr" href="index.php">GO back HOME!</a>
                </div>
            </div>
        </div>


        <div class="wrapper">
            <div class="row">
                <div class="column-left">
                 
                <article class="article-content">
                    <h2>Last ratings:</h2>
                    <ul>
                        <li><a class="link-hover" href="#">r1</a></li>
                        <li><a class="link-hover" href="#">r2</a></li>
                        <li><a class="link-hover" href="#">r3</a></li>
                        <li><a class="link-hover" href="#">r4</a></li>
                        <li><a class="link-hover" href="#">r5</a></li>
                     
                    </ul>
                </article>

                <article class="article-content">
                    <h2>Category topics</h2>
                    <ul>
                        <li><a class="link-hover" href="#">Topic 1</a></li>
                        <li><a class="link-hover" href="#">Topic 2</a></li>
                        <li><a class="link-hover" href="#">Topic 3</a></li>
                    </ul>
                </article>

                </div>
                <div class="column-right">
                    <?php
                            $rezultat =  get_types("ceva");
                            //while($row = mysqli_fetch_assoc($result)){


                           // }

                    ?>
                    <article class="article-content">
                        <header>
                            <h2>Category grade</h2>
                        </header>
                        <content>
                            <p>
                            NOTA!
                            </p>
                        </content>
                        <footer>
                            <p class="post-info">Incepand de la data introducerii topicului.</p>
                        </footer>

                        <h3>Rating total pana acum:</h3>
                        <div class="rating">
                            <span class="rating-star" data-value="5"></span>
                            <span class="rating-star" data-value="4"></span>
                            <span class="rating-star" data-value="3"></span>
                            <span class="rating-star" data-value="2"></span>
                            <span class="rating-star" data-value="1"></span>
                        </div>
                    </article>

                    <article class="article-content">
                    <header>
                        <h2>Number of users:</h2>
                    </header>
                    <content>
                        <p>
                            NUMAR!
                        </p>
                    </content>

                    </article>
            

                      <article class="article-content">
                    <header>
                        <h2>Time elapsed with this review</h2>
                    </header>
                    <content>
                        <p>
                            TIMP!
                        </p>
                    </content>

                </article>
                <article class="article-content">
                    <header>
                        <h2>Subcategories</h2>
                    </header>
                    <content>
                        <p>
                           -
-
-
-

                        </p>
                    </content>

                

                </div>
            </div>
        </div>

    
    <a href="#top" class="back-to-top">
        <p>Back to Top</p>
    </a>

</body>

</html>
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