<?php
	/* User verification */
	$username = $mysqli->escape_string($_POST['username']);
	$result = $mysqli->query("SELECT * FROM users WHERE username='$username'");

	if ( $result->num_rows == 0 )
	{ // if user doesn't exist
		$_SESSION['message'] = "User with that username doesn't exist!";
		header("location: error.php");
	}
	else 
	{ // if user exists
		$user = $result->fetch_assoc();

		if ( password_verify($_POST['password'], $user['password']) ) 
		{
			
			$_SESSION['email'] = $user['email'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['active'] = $user['active'];
			
			// This is how we'll know the user is logged in
			$_SESSION['logged_in'] = true;

			header("location: push.php");
		}
		else 
		{
			$_SESSION['message'] = "You have entered wrong password, try again!";
			header("location: error.php");
		}
	}
?>

