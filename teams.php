<?php
	//Require the navbar file to run
	require_once 'navbar.php';
	require_once 'footer.php';
	require_once 'Gateways/TeamsGateway.php';
	session_start();
?>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Teams</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="assets/lib/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel='site icon' href='favicon.ico' type='image/x-icon'/>
  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
</head>
<body>
  <?php displayNavbar(); ?>
        <div class="container">
          <br><br>
          <div id="teams" class="row">
						<?php
						$teams = TeamsGateway::getAllTeams();
						foreach($teams as $team)
						{
							$name = $team['Name'];
							$logo = $team['Logo'];
							$color = $team['Color'];
							$points = $team['Points'];
						echo <<<_END
            <div class="col s12 m12">
              <div class="card horizontal">
                <div class="card-image">
								<img src="$logo" alt="$name logo" style="width:200;height:200">
                </div>
                <div class="card-content">
                  <span class="card-title">$name</span>
                  <h1 id="$name-Score">$points</h1>
                </div>
                <div class="card-action">
                  <a href="events_page.php">View events page</a>
                </div>
              </div>
            </div>
_END;
					}
					?>

          </div>
          <br><br>
        </div>

  <?php displayFooter(); ?>

  <!--  Scripts-->
  <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
  <script src="assets/lib/jquery/jquery-2.1.1.min.js"></script>
  <script src="assets/lib/materialize/js/materialize.js"></script>
  <!--<script src="js/init.js"></script>-->

  </body>

</html>
