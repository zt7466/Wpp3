<?php
	//Require the navbar file to run
  require_once 'navbar.php';
  require_once 'footer.php';
  require_once 'Gateways/TeamsGateway.php';
  session_start();
  $logged_in = true;

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
	<title>Events Page</title>
	<!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="assets/lib/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel='site icon' href='favicon.ico' type='image/x-icon'/>
  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
</head>
<body>

  <?php displayNavbar(); ?>

  <div class="container">
  <div class="row"></div>
  <div class="row"></div>
  <div class="row">
    <form class="col s12" action="event_add_action.php" method="POST">
      <div class="row">
        <div class="input-field col s6">
          <input id="event_name" name="event_name" type="text" class="validate">
          <label for="event_name">Event Name</label>
        </div>
        <div class="input-field col s6">
          <input id="event_date" name="event_date" type="date" class="datepicker">
          <label for="event_date">Date</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="event_description" name="event_description" type="text" class="materialize-textarea"></textarea>
          <label for="event_description">Event Description</label>
        </div>
      </div>
      <b>Crew Points</b>

      <?php
	  $teams = TeamsGateway::getAllTeams();
	  foreach($teams as $team) {
      ?>
      <div class="row">
        <div class="col s12">
          <div class="input-field inline">
            <input id="<?php echo $team['ID']; ?>" type="number" name="<?php echo $team['ID']; ?>"class="validate">
            <label for="<?php echo $team['ID']; ?>" data-error="wrong" data-success="right"><?php echo $team['Name'] . " Points";?></label>
          </div>
        </div>
      </div>
      <?php } ?>

      <div class="row">
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
        </button>
      </div>
    </form>
  </div>
  </div>


  <?php displayFooter(); ?>


  <!--  Scripts-->
  <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
  <script src="assets/lib/jquery/jquery-2.1.1.min.js"></script>
  <script src="assets/lib/materialize/js/materialize.js"></script>
  <script>
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
        
  </script>
  <!--<script src="js/init.js"></script>-->
</body>
</html>
