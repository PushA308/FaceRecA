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

			require 'db.php';
			if(isset($_POST['attendence']))
			{$classmenu=$_POST['classmenu2'];
			$coursemenu=$_POST['coursemenu2'];}
?>
<?php 
		 
				  // Display message about account verification after registeration
				  if ( isset($_SESSION['message']) )
				  {
					  echo $_SESSION['message'];
					  unset( $_SESSION['message'] );
							header("location: index.php");
				  }
			  
			  ?>
			  
			<!--  <?php
			  
				  // Message to activate account
				  if ( !$active )
				  {
					  echo
					  '<div class="info">
					  Account is unverified, please confirm your email by clicking
					  on the email link!
					  </div>';
							
				  }
			  
			  ?> -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>FaceRecA</title>
    <!-- Bootstrap -->
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
				     	<a class="navbar-brand" href="push.php"><img src="img/logo7.png" style="max-width: 400px; margin-top: -112px; max-height: 260px; margin-left: -65px;"> </a>
					   		 </div>
	              			<div class="navbar-collapse collapse" id="list">
					            <ul class="nav navbar-nav">
					                <li class="divider-vertical"></li>
					                <li><a href="help.html" style="font-family: Baskerville;font-size: 18px;">Help</a></li>
					                <li><a href="#">|</a></li>
					                <li class="divider-vertical"></li>
					                <li><a href="about.html" style="font-family: Baskerville;font-size: 18px;">About</a></li>
					                <li><a href="#">|</a></li>
					                <li class="divider-vertical"></li>
					                <li><a href="contact.html" style="font-family: Baskerville;font-size: 18px;">Contact</a></li>
																					<li><a href="#">|</a></li>
					                <li class="divider-vertical"></li>
					                <li class="dropdown" style="height: 49px; }">
								          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong><?php echo $username; ?> 
								          </strong> 
								          <span class="glyphicon glyphicon-user pull-right"></span></a>
								         
								          <ul class="dropdown-menu">
								               <center>
								            <li><a href="#">My profile</a></li>
								            <li class="divider"></li>
								            <li><a href="#">Account Settings</a></li>
								            <li class="divider"></li>
								            <li><a href="logout.php">Sign Out</a></li>
								            </center>
					            </ul>
			     		 	</div>	
			     		 	</div>
					
			</nav>
		
				    <div class="my-navbar1 navbar-default navbar-fixed-top">
				     								
				    </div>
				   <!-- <br><br><Br><br><br><Br> -->
							<form name="search" action="runscript.php" method="post">
				    <div class="container-fluid">
				    <div id="l1">
				    	<div id="texts" style="float:left;font-family: Baskerville;
				    	font-size: 18px;"> 
                           <!--<h3><strong><font color="green">Name of the Faculty:</font></strong></h3> -->
                         </div> 
                          <br><br><br><br>
				    	<div class="row" id="list2" style="margin-left: 180px;">
				    		<ul class="nav navbar-nav">
				    		<li>
				    		<div class="dropdown" style="font-family: Baskerville;margin-left: -25px;" method="post"><font color="green" size="4.7px"><strong>Class
				    		</strong></font>&nbsp&nbsp
							    <select class="form-control" id="classmenu" name="classmenu" onchange="MyCourse()">
																		<option value="Select">Select</option>
																		<option value="FYIT"  >FYIT</option>
																		<option value="SYIT"  >SYIT</option>
																		<option value="TYIT"  >TYIT</option>
																		<option value="B.TechIT" >B.TechIT</option>
											</select> 					
										<!--	<input type="submit" name='save' value="Save"/> -->
											</div>
							</li>
								 
							<li>
				    		<div class="dropdown" style="font-family: Baskerville;margin-left: 20px;"><font color="green" size="4.7px;"><strong>Course</strong></font>
		&nbsp&nbsp					    <select class="form-control" id="coursemenu" name="coursemenu">
																		    <option>Select</option>
																		    <option  id="first"></option>
																						<option  id="second"></option>
																						<option  id="third"></option>
																						<option  id="forth"></option>
											</select> 
							</div>
							</li>
								&nbsp&nbsp&nbsp&nbsp	&nbsp&nbsp	
								<li>
				    		<div class="dropdown" style="font-family: Baskerville;margin-left: 80px;"><font color="green" size="4.7px;"><strong>Year</strong></font>
		&nbsp&nbsp					    <select class="form-control" id="year" name="year">
																		    <option>YYYY</option>
																								 <?php
																											$a=2017;
																											for($a=2017;$a<2028;$a++){
																								?>
																		    <option ><?php echo $a ;?></option>
																						<?php   }?>
											</select> 
							</div>
							</li>
							<li>
				    		<div class="dropdown" style="font-family: Baskerville;margin-left: 20px;"><font color="green" size="4.7px;"><strong>Month</strong></font>
		&nbsp&nbsp					    <select class="form-control" id="month" name="month">
																		    <option>MM</option>
																		    <?php
																											$a=01;
																											for ($a=01;$a<13;$a++){
																								?>
																		    <option ><?php echo $a ;?></option>
																						<?php   }?>

											</select> 
							</div>
							</li>

							<li>
				    		<div class="dropdown" style="font-family: Baskerville;margin-left: 20px;"><font color="green" size="4.7px;"><strong>Day</strong></font>
		&nbsp&nbsp					    <select class="form-control" id="date" name="day">
																		    <option>DD</option>
																		    <?php
																											$a=01;
																											for ($a=01;$a<32;$a++){
																								?>
																		    <option  ><?php echo $a ;?></option>
																						<?php   }?>
											</select> 
							</div>
							</li>

							
						</ul>
					</div>
				</div>
				
	<script>
     function MyCourse()
	{
					var x = document.getElementById("classmenu").value;
					
					if(x=== "Select")
					{
								document.getElementById("first").innerHTML = "";
								document.getElementById("second").innerHTML = "";
								document.getElementById("third").innerHTML = "";
								document.getElementById("forth").innerHTML = "";
					}
					if(x=== "FYIT")
					{
								document.getElementById("first").innerHTML = "C programming";
								document.getElementById("second").innerHTML = "Physics";
								document.getElementById("third").innerHTML = "Chemistry";
								document.getElementById("forth").innerHTML = "Mathematics";
					}
					if(x=== "SYIT")
					{
								document.getElementById("first").innerHTML = "TOC";
								document.getElementById("second").innerHTML = "Java Programming";
								document.getElementById("third").innerHTML = "Computer Networking";
								document.getElementById("forth").innerHTML = "Linear Algebra";
					}
					if(x=== "TYIT")
					{
								document.getElementById("first").innerHTML = "ISM";
								document.getElementById("second").innerHTML = "UOS";
								document.getElementById("third").innerHTML = "Parallel programming";
								document.getElementById("forth").innerHTML = "Information Technology";
					}
					if(x=== "B.TechIT")
					{
								document.getElementById("first").innerHTML = "Data Visualization";
								document.getElementById("second").innerHTML = "Bussiness Intelligence";
								document.getElementById("third").innerHTML = "VC";
								document.getElementById("forth").innerHTML = "Cyber Security ";
					}
				
}
</script>
								
							
						<br><br><br><br><br><br><br><br>
					<div id="l2">
						<div class="container-fluid">
							<div class="col-md-6">

								<center>
								<form name="search" action="push.php" method="get">
							    <div class="form-group" style="font-family: Baskerville;font-size: 20px;margin-left: 240px;" ><font color="green">
							        <label >Upload Image</label></font>
							        <div class="input-group" >
							            <span class="input-group-btn">
							                <span class="btn btn-default btn-file" style="font-family: Baskerville;">Browse… <input type="file" id="imgInp"/></span>
							            </span>
							            <input name="filename" type="text" class="form-control" readonly>
							        </div>
							        <img id='img-upload'/>
							    </div>
											
							    </center>
							</div>
						</div>
					</div>

				<script>
							$(document).ready( function() {
						    	$(document).on('change', '.btn-file :file', function() {
								var input = $(this),
									label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
   console.log(label);
								input.trigger('fileselect', [label]);
								});

								$('.btn-file :file').on('fileselect', function(event, label) {
								    
								    var input = $(this).parents('.input-group').find(':text'),
								        log = label;
								    console.log(input);
								    if( input.length ) {
								        input.val(log);
								    } else {
								        if( log ) alert(log);
								    }
							    
								});
								function readURL(input) {
								    if (input.files && input.files[0]) {
								        var reader = new FileReader();
								        console.log("shubham");
								        reader.onload = function (e) {
								            $('#img-upload').attr('src', e.target.result);
								        }
								        
								        reader.readAsDataURL(input.files[0]);
																
								    }
								}

								$("#imgInp").change(function(){
								    readURL(this);
												var fso =  new ActiveXObject("Scripting.FileSystemObject");  
    												var s = fso.OpenTextFile("/opt/lampp/htdocs/FaceRecA/input.txt", true);
    												s.WriteLine(readURL(this));
    												s.Close();
								}); 	
							});
			</script>	    

						<br><br>

					<div id="l3" style="margin-left: 330px;">
			

								<button type="submit" class="btn btn-success" style="font-family: Baskerville;"><strong>Attendnce</strong></button>
						</form>
					</div>
						<br> <hr style="color:green;"><br>
													<form name="search" action="push.php" method="post">
						<div class="row" id="list2" style="margin-left: 180px;">
				    		<ul class="nav navbar-nav">
				    		<li>
				    		<div class="dropdown" style="font-family: Baskerville;margin-left: -25px;" method="post"><font color="green" size="4.7px"><strong>Class</strong></font>
							    <select class="form-control" id="classmenu2" name="classmenu2" onchange="MyCourse2()">
																		<option value="Select">Select</option>
																		<option value="FYIT"  >FYIT</option>
																		<option value="SYIT"  >SYIT</option>
																		<option value="TYIT"  >TYIT</option>
																		<option value="B.TechIT" >B.TechIT</option>
											</select> 					
										<!--	<input type="submit" name='save' value="Save"/> -->
											</div>
							</li>
								 
							<li>
				    		<div class="dropdown" style="font-family: Baskerville;margin-left: 20px;"><font color="green" size="4.7px;"><strong>Course</strong></font>
						    <select class="form-control" id="coursemenu2" name="coursemenu2">
																		    <option>Select</option>
																		    <option  id="first1"></option>
																						<option  id="second2"></option>
																						<option  id="third3"></option>
																						<option  id="forth4"></option>
											</select> 
							</div>
							</li>
								</ul>
									</div>
<script>
function MyCourse2()
	{
					var y = document.getElementById("classmenu2").value;
					
					if(y=== "Select")
					{
								document.getElementById("first1").innerHTML = "";
								document.getElementById("second2").innerHTML = "";
								document.getElementById("third3").innerHTML = "";
								document.getElementById("forth4").innerHTML = "";
					}
					if(y=== "FYIT")
					{
								document.getElementById("first1").innerHTML = "C programming";
								document.getElementById("second2").innerHTML = "Physics";
								document.getElementById("third3").innerHTML = "Chemistry";
								document.getElementById("forth4").innerHTML = "Mathematics";
					}
					if(y=== "SYIT")
					{
								document.getElementById("first1").innerHTML = "TOC";
								document.getElementById("second2").innerHTML = "Java Programming";
								document.getElementById("third3").innerHTML = "Computer Networking";
								document.getElementById("forth4").innerHTML = "Linear Algebra";
					}
					if(y=== "TYIT")
					{
								document.getElementById("first1").innerHTML = "ISM";
								document.getElementById("second2").innerHTML = "UOS";
								document.getElementById("third3").innerHTML = "Parallel programming";
								document.getElementById("forth4").innerHTML = "Information Technology";
					}
					if(y=== "B.TechIT")
					{
								document.getElementById("first1").innerHTML = "Data Visualization";
								document.getElementById("second2").innerHTML = "Bussiness Intelligence";
								document.getElementById("third3").innerHTML = "VC";
								document.getElementById("forth4").innerHTML = "Cyber Security ";
					}
				
}
</script>
<br><br><br><br>
						<div id="l4" style="font-family: Baskerville;font-size: 18px;margin-left:150px;">					
							<button type="submit" class="btn btn-success" name="attendence" ><strong>Show-Attendnce</strong></button>
								</form>
								<?php 
											if(isset($_POST['attendence'])&&isset($_POST['classmenu2'])&&isset($_POST['coursemenu2'])&&(!($classmenu=="Select"))&&(!($coursemenu=="Select")))
												{
		
																						
																					//	$classmenu="TYIT";
																						//$coursemenu="UOS";
																						$query="select * from Attendence where Class= '".$classmenu."' and Course_name='".$coursemenu."'";
																						if($list=mysqli_query($mysqli,$query))
																					{
			
																						
														?>
														<div id="myDIV">
														<table class="table table-bordered">
								    <thead>
								      <tr>
								        <th><p align="center">Roll_No</p></th>
								        <!--<th><p align="center">Name</p></th>-->
								        <th><p align="center">Attendance percent</p> </th>
								        <th></th>
								      </tr>
								    </thead>
								    <tbody>
													<?php 
																				while($row_list=mysqli_fetch_assoc($list)){
                ?>
								      <tr>
								        <td><? echo $row_list['Roll_No']; ?></td>
								        <!--<td><? echo $row_list['SName']; ?></td>-->
								        <td></td>
																
								        <td><p align="center"><button type="button" class="btn btn-success">Modify</button></p></td>
								      </tr>
														<?php } ?>
								    </tbody>
								</table>
																					
										
								<?php }else{
					echo '<script>alert("query")</script>';
						echo mysqli_error($mysqli);
}}
								elseif(isset($_POST['attendence']))
		{
?>
			<script type="text/javascript">
				alert("Please fill in all fields");
			</script>
<?php			
			//header("refresh:2;url=push.php");

		}
?>

						</div>
							<script>
									function myFunction() {
									    var x = document.getElementById('myDIV');
									    if (x.style.display === 'none') {
									        x.style.display = 'block';
									    } else {
									        x.style.display = 'none';
									    }
									}
							</script>
							<br><br><br>
							




					</div>
				</nav>	
  </body>
</html>
