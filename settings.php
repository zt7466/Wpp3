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
	<h1 class="header orange-text">Account</h1>
      <div class="row">
		<ul class="collapsible" data-collapsible="accordion">
		  <li>
		  <div class="collapsible-header"><i class="material-icons">supervisor_account</i><h4>Add User</h4></div>
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