<?php
	/*Log out*/
	session_start();
	session_unset();
	session_destroy();
	header("location: error.php");
?>
<!--<!DOCTYPE html>
<html>
	<head>
	  <meta charset="UTF-8">
	  <title>Error</title>
	</head>
	<body>
		<div class="form">
			  <h1>Thanks for stopping by</h1>
				  
			  <p><?= 'You have been logged out!'; ?></p>
			  
			  <a href="index.php"><button class="button button-block"/>Home</button></a>
		</div>
	</body>
</html> -->
