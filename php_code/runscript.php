<?php
/*if ( $_SESSION['logged_in'] != 1 ) 
	{
	  //$_SESSION['message'] = "You must log in before viewing your profile page!";
	  header("location: error.php");    
	}
	else 
	{
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
		$active = $_SESSION['active'];
	}*/

			require 'db.php';

if(isset($_POST['classmenu'])&&isset($_POST['coursemenu'])&&isset($_POST['filename'])&&isset($_POST['year'])&&isset($_POST['month'])&&isset($_POST['day'])&&(!($_POST['coursemenu']=="Select"))&&(!($_POST['classmenu']=="Select"))&&(!($_POST['day']=="DD"))&&(!($_POST['month']=="MM"))&&(!($_POST['year']=="YYYY")))
{
						$classmenu=$_POST['classmenu'];
						$coursemenu=$_POST['coursemenu'];
						$filename=$_POST['filename'];
						$day=$_POST['day'];
						$month=$_POST['month'];
						$year=$_POST['year'];
						$file = fopen("input.txt","w");
						//fwrite($file,$classmenu."/".$coursemenu."/".$filename."/".$year."-".$month."-".$day);
						$command = escapeshellcmd('/opt/lampp/htdocs/FaceRecA/recognitionfinal.py');
						if(shell_exec($command))
						{?>
									<sript>
															alert("success");
									</script><?php }
						fwrite($file,$classmenu."/".$coursemenu."/".$filename."/".$year."-".$month."-".$day);
						#echo $output;
						header('Location:push.php');
}	
else
		{
?>
			<script type="text/javascript">
				alert("Please fill in all fields");
			</script>
<?php			
			header("refresh:2;url=push.php");

		}
?>

