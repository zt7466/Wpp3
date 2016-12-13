<?php
	//Require the navbar file to run
  require_once 'navbar.php';
  require_once 'footer.php';
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

  <div class="container">
  <?php 
    $evg = new EventsGateway();
    $events = $evg->getRecentEvents(100); // 100 something something enough for everyone something something

    $current_id = -1;

    $event_name;
    $event_date;
    $event_desc;
    $first = true;

    foreach($events as $event) {
      $event_tn = $event['team_name'];
      $event_tp = $event['points'];
      $team_bg = $event['team_bg'];

      // Print New Event Header
      if($current_id != $event['id']) {
        if($first != true) {
        ?>
              </div>    
              <p><?php echo $event_desc; ?></p>   
            </div>
          </div>
        </div>
        <?php 
        }

        $event_name = $event['event_name'];
        $event_date = $event['event_date'];
        $event_desc = $event['event_desc'];
        $current_id = $event['id'];
        $first = false;

        ?>
        <div class="row s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title"><?php echo $event_name . " (" . $event_date . ")"; ?></span>   
              <div class="card horizontal">  
        <?php } ?>
              <div class="card-stacked" style="background-color: <?php echo $team_bg; ?>;">
                <div class="card-content white-text">
                  <p><?php echo $event_tn; ?></p>
                  <h2><?php echo $event_tp; ?></h2>
                </div>
              </div>
        <?php
    }    
   ?>
              </div>    
              <p><?php echo $event_desc; ?></p>   
            </div>
          </div>
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
