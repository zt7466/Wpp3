<?php
	//Require the navbar file to run
	require_once 'navbar.php';
	require_once 'footer.php';
	session_start();
	
	//Check to make sure the user has a session. Otherwise,
	//redirect them to the home page.
	if(strlen($_SESSION['username']) <= 0 || strlen($_SESSION['token']) <= 0)
	{
		destroySession();
		echo '<meta http-equiv="refresh" content="0; url=index.php"/>';
	}
?>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name = "viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>Account Settings</title>
	<!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="assets/lib/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel='site icon' href='favicon.ico' type='image/x-icon'/>
  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
</head>
<body>

  <?php displayNavbar(); ?>
  
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
	<h1 class="header orange-text">Account Settings</h1>
      <div class="row">
		<ul class="collapsible" data-collapsible="accordion">
		  <li>
		  <div class="collapsible-header"><i class="material-icons">person_pin</i><h4>Add User</h4></div>
		  <div class="collapsible-body">
			  <div class="card blue">
				<div class="card-content white-text">
				  <span class="card-title"><b>Add User</b></span>
					  <form id="create" action="userCreation.php" method="post">
						<input type="text" class="grey lighten-4 black-text round" name="username" id="username" size="24" placeholder="Username" value="" required></input>
						<button id="createSubmit" type="submit" class="btn orange waves-effect waves" value="Submit">Submit</button>
					  </form>
				</div>
			  </div>
		  </div>
		  </li>
		  <li>
		  <div class="collapsible-header"><i class="material-icons">delete</i><h4>Remove User</h4></div>
	      <div class="collapsible-body">
			  <div class="card blue">
				  <div class="card-content white-text">
					  <span class="card-title"><b>Remove User</b></span>
					  <div class="row"> 						
						<form action="userDelete.php" method="post">
						<select name="username" class="btn white black-text waves-effect">
							<option value="first">Select a user...</option>
							<?php
								//Set up tag template
								$firstPart = '<option value=';
								$secondPart = '>';
								$thirdPart = '</option>';
								
								//Get connection to the Users database and store all
								//rows' usernames
								$conn = ConnectionHandler::getConnection();
								$result = $conn->query("SELECT Username from webprog27.Users;");
								$result = $result->fetchAll();
								
								//Loop through each row and add
								$x = 0;
								while($result[$x][0] != null)
								{
									if($result[$x][0] == null)
									{
										echo "Column at ".$x." was null<br>";
									}
									else
									{
										//Check to make sure current user is not in the list
										if($result[$x][0] != $_SESSION['username'])
										{
											$name = $result[$x][0];
											$item = $firstPart.$name.$secondPart.$name.$thirdPart;
											echo $item;
										}
									}
									
									$x = $x+1;
								}
							?>
						</select>
						<button type="submit" class="btn orange waves-effect waves">Submit</button>
					</form>
				  </div>
			  </div>
		  </div>
		  </li>
		  <li>
		  <div class="collapsible-header"><i class="material-icons">assignment</i><h4>Change Password</h4></div>
		  <div class="collapsible-body">
			  <div class="card blue">
				<div class="card-content white-text">
				  <span class="card-title"><b>Change Password</b></span>
				  <!--<script type="text/javascript">
					/**
					 * @author Drew Rife
					 *
					 * Checks to see if the passwords match when changing the password 
					 */
					function checkPasswordsMatch()
					{
						var password = document.getElementById("new_password").value;
						var confirmed_password = document.getElementById("confirm").value;
						
						/* check if the password fields match or not */
						if(password !== confirmed_password)
						{
							alert("Error: password fields do not match");
							document.getElementById("new_password").value = "";
							document.getElementById("confirm").value = "";
							return false;
						}
						else
						{
							/* passwords match, submit post*/
							$.ajax({
								type: "POST",
								url: "changePassword.php",
								data: password,
								success: function(msg)
								{
									alert(msg)
								}
							})
							return true;
						}
					}
					</script>
					  <form id="loginForm" action="#" method="post" onsubmit="return checkPasswordsMatch()">
						<label for="password" class="card-title white-text">New Password</label>
						<input type="password" class="grey lighten-4 black-text round" name="new_password" id="new_password" size="24" placeholder="New Password" value="" required></input>
						<label for="confirm" class="card-title white-text">Confirm</label>
						<input type="password" class="grey lighten-4 black-text round" name="confirm" id="confirm" size="24" placeholder="Confirm" value="" required></input>
						<button id="createSubmit" type="submit" class="btn orange waves-effect waves" value="Submit">Submit</button>
						<?php echo '<input type="hidden" name="username" id="username" value='.$_SESSION['username'].'></input>'; ?>
					  </form>
					  -->
					  <form id="loginForm" action="changePassword.php" method="post">
						<button id="createSubmit" type="submit" class="btn orange waves-effect waves" value="Submit">Continue</button>
					  </form>
				</div>
			  </div>
		  </div>
		  </li>
		  <li>
		  <div class="collapsible-header"><i class="material-icons">supervisor_account</i><h4>Add Team</h4></div>
		  <div class="collapsible-body">
			  <div class="card blue">
				<div class="card-content white-text">
				  <span class="card-title"><b>Add Team</b></span>
					  <form id="addTeam" action="addTeam.php" method="post">
						<label for="teamname" class="card-title white-text">Team Name</label>
						<input type="text" class="grey lighten-4 black-text round" name="teamname" id="teamname" size="24" placeholder="Team Name" value="" required></input>
						<label for="color" class="card-title white-text">Team Color<center>Preview</center></label>
						<div class="row">
							<div class="col s3">
								<input type="text" onchange="colorPreview()" class="grey lighten-4 black-text round" name="color" id="color" size="24" pattern="^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$" placeholder="#01de23" value="" maxlength="7" title="Must be in the format #01ab23, using only 0-9 and A-F" required></input>
							</div>
							<div class="col s4 offset-s2">
								<a id="preview">This is a preview of your team color.</a>
								<script type="text/javascript">
								<!--Use Javascript to display a preview of the color-->
									function colorPreview()
									{
										document.getElementById("preview").style.color=document.getElementById("color").value;
									}
								</script>
							</div>
						</div>
						<button id="createSubmit" type="submit" class="btn orange waves-effect waves" value="Submit">Submit</button>
					  </form>
				</div>
			  </div>
		  </div>
		  </li>
		  <li>
		  <div class="collapsible-header"><i class="material-icons">thumb_down</i><h4>Remove Team</h4></div>
		  <div class="collapsible-body">
			  <div class="card blue">
				  <div class="card-content white-text">
					  <span class="card-title"><b>Remove Team</b></span>
					  <div class="row"> 						
						<form action="userDelete.php" method="post">
						<select name="username" class="btn white black-text waves-effect">
							<option value="first">Select a team...</option>
							<?php
								//Set up tag template
								$firstPart = '<option value=';
								$secondPart = '>';
								$thirdPart = '</option>';
								
								//Get connection to the Users database and store all
								//rows' usernames
								$conn = ConnectionHandler::getConnection();
								$result = $conn->query("SELECT Name from webprog27.Teams;");
								$result = $result->fetchAll();
								
								//Loop through each row and add
								$x = 0;
								while($result[$x][0] != null)
								{
									if($result[$x][0] == null)
									{
										echo "Column at ".$x." was null<br>";
									}
									else
									{
										$name = $result[$x][0];
										$item = $firstPart.$name.$secondPart.$name.$thirdPart;
										echo $item;
									}
									
									$x = $x+1;
								}
							?>
						</select>
						<button type="submit" class="btn orange waves-effect waves">Submit</button>
					</form>
				  </div>
			  </div>
		  </div>
		  </div>
		  </li>
		  <li>
		  <div class="collapsible-header"><i class="material-icons">mode_edit</i><h4>Edit Team</h4></div>
		  <div class="collapsible-body">
			  <div class="card blue">
				<div class="card-content white-text">
				  <span class="card-title"><b>Edit Team</b></span>
				  Dummy text
				</div>
			  </div>
		  </div>
		  </li>		  
		</ul>
	  </div>
    </div>
  
  <?php displayFooter(); ?>
  
  <!--  Scripts-->
  <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
  <script src="assets/lib/jquery/jquery-2.1.1.min.js"></script>
  <script src="assets/lib/materialize/js/materialize.js"></script>
  <!--<script src="js/init.js"></script>-->
</body>
</html>