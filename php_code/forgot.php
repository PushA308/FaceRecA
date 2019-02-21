<?php 
	/*Link to reset password*/
	require 'db.php';
	session_start();

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
	{   
		$email = $mysqli->escape_string($_POST['email']);
		$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

		if ( $result->num_rows == 0 ) //user doesn't exist
		{ 
			$_SESSION['message'] = "User with that email doesn't exist!";
			header("location: error.php");
		}
		else 
		{	//user exists

			$user = $result->fetch_assoc();
			
			$email = $user['email'];
			$hash = $user['hash'];
			$first_name = $user['first_name'];

			$_SESSION['message'] = "<p>Please check your email <span>$email</span>"
			. " for a confirmation link to complete your password reset!</p>";

			//send reset confirmation link
			$to      = $email;
			$subject = 'Password Reset Link (FaceRecA)';
			$message_body = '
			Hello '.$first_name.',

			You have requested password reset!

			Please click this link to reset your password:

			http://localhost:8080/FaceRecA/reset.php?email='.$email.'&hash='.$hash;  

			mail($to, $subject, $message_body);

			header("location: success.php");
	  }
	}
?>
<!DOCTYPE html>
<html>
	<head>
	  <title>Reset Your Password</title>
	</head>

	<body>		
	  <div class="form">

		<h1>Reset Your Password</h1>

		<form action="forgot.php" method="post">
		 <div class="field-wrap">
		  <label>
			Email Address<span class="req">*</span>
		  </label>
		  <input type="email"required autocomplete="off" name="email"/>
		</div>
		<button class="button button-block"/>Reset</button>
		</form>
	  </div>	  
	</body>
</html>
