<?php

	session_start();

	// Check if user is logged in
	if ( $_SESSION['logged_in'] != 1 ) 
	{
	  //$_SESSION['message'] = "You must log in before viewing your profile page!";
	  header("location: error.php");    
	}
	else 
	{
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
		$active = $_SESSION['active'];
	}
?>
<!DOCTYPE html>
<html >
	<head>
	  <meta charset="UTF-8">
	  <title>Welcome <?= $username ?></title>
	   <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body>
			<nav class="my-navbar navbar navbar-default navbar-fixed-top">
			 		<div class="container-fluid">
			     		 	<div class="navbar-header">
				     	<a class="navbar-brand" href="push.html"><img src="img/logo7.png" style="max-width: 400px; margin-top: -112px; max-height: 260px; margin-left: -65px;"> </a>
					   		 </div>
	              			<div class="navbar-collapse collapse" id="list">
					            <ul class="nav navbar-nav">			              
					                <li class="divider-vertical"></li>
					                <li class="dropdown" style="height: 49px; }">
								          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong>
								          <?php echo $username?>
								          </strong> 
								          <span class="glyphicon glyphicon-user pull-right"></span></a>
								         
								          <ul class="dropdown-menu">
								               <center>
								            <li><a href="#">My profile</a></li>
								            <li class="divider"></li>
								            <li><a href="#">Account Settings</a></li>
								            <li class="divider"></li>
								            <li><a href="#">Sign Out</a></li>
								            </center>
								          </ul>
								          
      								</li>
					            </ul>
			     		 	</div>	
			     		 </div>
			</nav>
		
				    <div class="my-navbar1 navbar-default navbar-fixed-top">
				     
				    </div>
			  <div class="form">

			  		<div id="texts" style="float:left; margin-left: 30px;
                                    font-family: Baskerville;font-size: 18px;"> 
                            <h1>
                            	<font color="green">Welcome</font>
                            </h1>
                    </div>
					  <h1></h1>
					  
					  <p>
					  <?php 
				 
						  // Display message about account verification after registeration
						  if ( isset($_SESSION['message']) )
						  {
							  echo $_SESSION['message'];
							  unset( $_SESSION['message'] );
						  }
					  
					  ?>
					  </p>
					  
					  <?php
					  
						  // Message to activate account
						  if ( !$active )
						  {
							  echo
							  '<div class="info">
							  Account is unverified, please confirm your email by clicking
							  on the email link!
							  </div>';
						  }
					  
					  ?>
					  
					  <h2><?php echo $username?></h2>
					  <p><?= $email ?></p>
					  
					  <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

				</div>
		

			</div>
		</nav>

	</body>
</html>
