<?php

	include_once 'header.php';
	include_once '../models/db_connection.php';
	session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: ./login.php");
        exit();
	}
	if(!isset($_POST['complete'])){
		header("Location: ./404page.php");
        exit();
	}
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Time for feedback</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="../../public/Images/icons/favicon.ico"/>
	
	<link rel="stylesheet" type="text/css" href="../../public/css/chestionar.css">
	<!--<link rel="stylesheet" type="text/css" href="../../public/css/util.css"> -->

</head>
<body>

	<div class="bg-contact2" style="background-image: url('../../public/Images/bg-01.jpg');">
		<div class="container-contact2">
			<div class="wrap-contact2" style="width: 1100px;">
				<form class="contact2-form validate-form" action="../controllers/controll_chestionar.php" method="POST" >
					<?php

						echo '<span class="contact2-form-title">
								Give us the feedback for **';
						$object_id = $_POST['complete'];
						$sql = "SELECT * from objects where object_id = '$object_id';";
						$result = mysqli_query($conn, $sql);
						if($row = mysqli_fetch_assoc($result)){
							echo $row['name'];
						}
						echo '**!
							</span>';
						echo '<p>For a better understanding of your opinion, use words like: placut, da, ok, nu. </p>';
						echo '<p id=ultimu>Complete all fields with no more than 255 characters. </p>';

						$count = 1;
						$sql = "SELECT * from questionnaire where object_id = '$object_id' order by question_id asc;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
	
						if($resultCheck > 0){
							while($row = mysqli_fetch_assoc($result)){
								echo '<div class="wrap-input2 validate-input" >
									<input class="input2" type="text" name="question' . $count . '">
									<span class="focus-input2" data-placeholder="';
								$count++;
								echo $row['question'];
								echo '"></span>
									</div>';
								
							}
						}
					?>

					<!--
					<div class="wrap-input2 validate-input" >
						<input class="input2" type1="text" name="name">
						<span class="focus-input2" data-placeholder="Good experience with specific parts of the topic(ex. name/name/name etc)"></span>
					</div>

					<div class="wrap-input2 validate-input" >
						<textarea class="input2" name="message"></textarea>
						<span class="focus-input2" data-placeholder="You can use the big words now! Describe it all :D !"></span>
					</div>
					-->	
						
					<label for="opinion">Your opinion </label>
                    <select id="opinion" name="opinion">
                        <option value="5">Excellent</option>
                        <option value="4">Acceptable</option>
                        <option value="3">So and so</option>
                        <option value="2">Not really good</option>
                        <option value="1">Horribly</option>
                    </select>


					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn" type="submit" name="submit" value=<?php echo $object_id; ?>> Send Your Feedback </button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>




	<script src="js/main.js"></script>

	
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

</body>
</html>

