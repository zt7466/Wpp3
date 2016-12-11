<?php
	//Require the navbar file to run
	require_once 'navbar.php';
  require_once 'Gateways/EventsGateway.php';
  require_once 'Gateways/PointsGateway.php';
  require_once 'Gateways/TeamsGateway.php';
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
</head>
<body>

  <?php displayNavbar(); ?>

 <?php 
    $events = EventsGateway::getAllEvents();
  
    echo "<style>table, th, td {border: 1px solid black;}</style>";
    echo "<table>";
   foreach($events as $event)
        {

          $points = PointsGateway::retrieveByEventID($event['ID']);
          $title = $event['Name'];
          $date = $event['Date'];
          $description = $event['Description'];

          $nullPointerPoints = $points[0]['Points'];
          $offByOnePoints = $points[0]['Points'];
          $outOfBoundsPoints = $points[0]['Points'];

          if(is_null($nullPointerPoints))
          {
            $nullPointerPoints = 'N/A';
          }
          if(is_null($offByOnePoints))
          {
            $offByOnePoints = 'N/A';
          }
          if(is_null($outOfBoundsPoints))
          {
            $outOfBoundsPoints = 'N/A';
          }
            echo <<<_END
      <div class="card">
            <div class="card-content">
              <span class="card-title">$title -  $date</span>   
              <div class="card horizontal">     
              
                <div class="card-stacked blue darken-1">
                  <div class="card-content white-text">
                    <p>Off By One</p>
                    <h2>$offByOnePoints</h2>
                  </div>
                </div>
                <div class="card-stacked green darken-1">
                  <div class="card-content white-text">
                    <p>Out of Bounds</p>
                    <h2>$outOfBoundsPoints</h2>
                  </div>
                </div>
                <div class="card-stacked red darken-1">
                  <div class="card-content white-text">
                    <p>Null Pointer</p>
                    <h2>$nullPointerPoints</h2>
                  </div>
                </div>
              </div>    
              <p>$description</p>   
            </div>
          </div>
_END;

  }
  echo "</table> <br>";
   ?>


  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">Money can be exchanged for goods and services.</p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      &copy; 2016 Team 3
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
  <script src="assets/lib/jquery/jquery-2.1.1.min.js"></script>
  <script src="assets/lib/materialize/js/materialize.js"></script>
  <!--<script src="js/init.js"></script>-->
</body>
</html>
