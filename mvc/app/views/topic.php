<?php

   // include_once 'header.php';
   
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

<h1 class="heading header__item">CREATE</h1>




</header>


<div class="ellipse-container">






<div class="container">
  <h2>New Topic</h2>
  <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Topic Name</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter Topic Name" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Enter a time limit:</label>
      <div class="col-sm-10">          
        <input type="Activation Hours" class="form-control" id="pwd" placeholder="Enter Hours < 252 Hrs" name="pwd">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember">Accept Anonymous</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Create</button>
      </div>
    </div>
  </form>
</div>



 





<h2 class="greeting">COMPLETE</h2>
<div class="ellipse ellipse__outer--thin">
<div class="ellipse ellipse__orbit"></div>
</div>
<div class="ellipse ellipse__outer--thick"></div>

</div></div></div></div>
</body>

</html>


