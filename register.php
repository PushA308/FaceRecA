<?php
	/* Registration process*/
	
	// Set session variables
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['email'] = $_POST['email'];

	
	$username = $mysqli->escape_string($_POST['username']);
	$email = $mysqli->escape_string($_POST['email']);
	$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
	$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
		  
	// Check if user with that email already exists
	$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

	// Already exists if rows > 0
	if ( $result->num_rows > 0 ) 
	{
		$_SESSION['message'] = 'User with this email already exists!';
		header("location: error.php");	
	}
	else 
	{ 
		$sql = "INSERT INTO users (username, email, password, hash) " 
				. "VALUES ('$username','$email','$password', '$hash')";

		// Add user to the database
		if ( $mysqli->query($sql) )
		{

			$_SESSION['active'] = 1; //0 until user activates their account with verify.php
			$_SESSION['logged_in'] = true;
			//$_SESSION['message'] =
					
			//		 "Confirmation link has been sent to $email, please verify
			//		 your account by clicking on the link in the message!";

			// Mailing confirmation link 
			$to      = $email;
			$subject = 'Account Verification (FaceRecA)';
			$message_body = '
			Hello '.$username.',

			Please click this link to activate your account:

			http://localhost:8080/facereca/verify.php?email='.$email.'&hash='.$hash;

			mail( $to, $subject, $message_body );

			header("location: push.php");

		}

		else 
		{
			$_SESSION['message'] = 'Registration failed!';
			header("location: error.php");
		}

	}
?>
