<?php
	//Require the navbar file to run
	require_once 'navbar.php';
  	require_once 'footer.php';

	session_start();

?>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name = "viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>Events Page</title>
	<!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="assets/lib/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel='site icon' href='favicon.ico' type='image/x-icon'/>
  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->

   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  
  <script>
 
    $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
 
  </script>

</head>
<body>
  <?php displayNavbar(); ?>

  	<script>

	   function validate(form)
		{
			fail  = form.field1.value;
			
			if(fail == "5") 
			{
				alert("You know this page does nothing");
				return true;
			}
			else if(fail > 5)
			{
				alert("Oh thank you very much");
				return true;
			}
			else if(fail =="1" || fail =="2" || fail =="3" || fail =="4")
			{
				alert("Come on you know this is a 5 star page!");
				return false;
			}
			else 
			{
				alert("Not valid number"); 
				return false;
			}
		}
		
		
	</script>
		<div class= "container">
  			<div align="center" class = "container">

			<th colspan="2" align = "center"> Do You Like This Webpage </th> 
			</div>
			
  		<form method = "post" action = "rateThisPage.php" onSubmit = "return validate(this)">

			<tr><td>Please Rate this page between 1-5:</td>
			<td><input type = "text" name = "field1" value = ""></td></tr>

			<tr><td colspan = "2" align = "center">
				 <button class="btn waves-effect waves-light" type="submit" name="action" value="Submit">Submit
   			<i class="material-icons right">send</i>
  		</button>
			</td>
			</tr>
			</form>
		</div>
  		<?php displayFooter(); ?> 
	</body>
</html>