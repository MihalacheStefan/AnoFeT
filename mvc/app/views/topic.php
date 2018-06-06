<?php

    //include_once 'header.php';
   
   session_start();
   if(!isset($_SESSION['user_id'])){
        header("Location: ./404page.php");
        exit();
   }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creating your topic Yuuuuuhuu</title>
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

                    <h1 class="heading header__item">Create your new Feedback Object</h1>

                </header>


                <div class="ellipse-container">


                    <div class="infobox">
                        <h2>New Topic</h2>
                        <form class="form-horizontal">

                            <div id="form-container">
                                <label for="objectname">Topic Name</label>
                                <input type="text" id="objectname" name="objectname" placeholder="Enter Topic Name">

                                <label for="type">Type</label>
                                <select id="type" name="type">
                                    <option value="event">Event</option>
                                    <option value="person">Person</option>
                                    <option value="place">Place</option>
                                    <option value="product">Product</option>
                                    <option value="service">Service</option>
                                    <option value="artifact">Artistic artifact</option>
                                </select>


                                <label for="description">Description</label>
                                <input type="text" id="description" name="description" placeholder="Enter a description">
                            </div>

                            <button id="addQ" type="create" name="create">Add question</button>


                            <label for="time">Enter a time limit:</label>
                            <div class="col-sm-10">
                                <input type="text" id="time" placeholder="Enter Hours < 252 Hrs" name= "time">
                            </div>

                            <!--   
                            <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember">Accept Anonymous</label>
                            </div>
                            </div>
                            -->

                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="submit">Create</button>
                            </div>

                        </form>
                    </div>



                    <h2 class="greeting">COMPLETE</h2>
                    <div class="ellipse ellipse__outer--thin">
                        <div class="ellipse ellipse__orbit"></div>
                    </div>
                    <div class="ellipse ellipse__outer--thick"></div>

                </div>
            </div>
        </div>
    </div>
</body>



</html>


<script >

    let a = document.getElementById('addQ');

    let ok = true;

    a.onclick = (event) => {
        event.preventDefault();

        var container = document.getElementById('form-container');

        if (ok) {
            let label = document.createElement('label');
            label.innerText = 'Questions';

            container.appendChild(label);

            ok = false;
        }

        let textarea = document.createElement('textarea');
        textarea.classList = 'question';
        textarea.rows = 7;
        textarea.placeholder = 'Question..';
        textarea.style = 'display: block; margin: 10px auto; width: 100%; resize: none;';

        container.appendChild(textarea);
    }
</script>