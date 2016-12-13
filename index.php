<?php
	/*---------------------*
	 * Raistlin Hess       *
	 *---------------------*/

	//Require the navbar file to run
	require_once 'navbar.php';
	require_once 'footer.php';
	require_once 'Gateways/TeamsGateway.php';
	require_once 'Gateways/PointsGateway.php';
	session_start();
	//$result = passwordHasher('test', 'password', 'insert');//$gateway->insert("raistlin","password");

	/*---------------------*
	 * End Raistlin Hess   *
	 *---------------------*/
?>

<!--
@author Joss Steward, Brad Olah, Raistlin Hess
-->
<html lang="en">
<head>
<script src="assets/lib/jquery/jquery-2.1.1.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Team Homepage</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="assets/lib/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
</head>
<body>

  <?php displayNavbar() ?>

  <div class="section no-pad-bot light-blue" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row">

				<?php
				$teams = TeamsGateway::getAllTeams();
				foreach($teams as $team)
				{
					$name = $team['Name'];
					$logo = $team['Logo'];
					$color = $team['Color'];
					$points = $team['Points'];
				echo <<<_END
				<div class="col s12 l4">
          <div class="card large">
            <div class="card-image">
              <canvas id="$name" style="padding-left: 0;padding-right: 0;margin-left: auto;margin-right: auto;display: block;"width="215" height="220"></canvas>
            </div>
            <div class="card-content">
              <span class="card-title">$name</span>
              <h1 id="$name.score">$points</h1>
            </div>
            <div class="card-action">
              <a href="#">View team page</a>
            </div>
          </div>
        </div>
_END;
				}
				?>
      </div>
      <br><br>
    </div>
  </div>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>

      <div class="row">
        <div class="col s12 l5">
          <h1 class="header center orange-text">News</h1>

          <div class="card blue-grey">
            <div class="card-content white-text">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div>
          </div>

          <div class="card">
            <div class="card-content">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div>
          </div>

          <div class="card red lighten-2">
            <div class="card-content">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
        <div class="col s12 l7">
          <h1 class="header center orange-text">Tally</h1>

          <div class="card-stacked">
            <div class="card horizontal">
              <div class="card-stacked deep-orange darken-4">
                <div class="card-content white-text">
                  <h2>103</h2>
                  <p>Null Pointer</p>
                </div>
              </div>
              <div class="card-stacked green darken-4">
                <div class="card-content white-text">
                  <h2>103</h2>
                  <p>Null Pointer</p>
                </div>
              </div>
              <div class="card-stacked blue darken-4">
                <div class="card-content white-text">
                  <h2>103</h2>
                  <p>Null Pointer</p>
                </div>
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p>Event description goes somewhere</p>
                </div>
                <div class="card-action">
                  <a href="#">This is a link</a>
                </div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-content">
              <span class="card-title">Event Title - Nov 13, 2014</span>
              <div class="card horizontal">
                <div class="card-stacked blue darken-1">
                  <div class="card-content white-text">
                    <h2>103</h2>
                    <p>Null Pointer</p>
                  </div>
                </div>
                <div class="card-stacked green darken-1">
                  <div class="card-content white-text">
                    <h2>103</h2>
                    <p>Null Pointer</p>
                  </div>
                </div>
                <div class="card-stacked red darken-1">
                  <div class="card-content white-text">
                    <h2>103</h2>
                    <p>Null Pointer</p>
                  </div>
                </div>
              </div>
              <p>This would be the event description. This would be the event description. This would be the event description.</p>
            </div>
          </div>

          <div class="card">
            <div class="card-content">
              <span class="card-title">Event Title - Nov 13, 2014</span>
              <div class="card horizontal">
                <div class="card-stacked blue darken-1">
                  <div class="card-content white-text">
                    <h2>103</h2>
                    <p>Null Pointer</p>
                  </div>
                </div>
                <div class="card-stacked green darken-1">
                  <div class="card-content white-text">
                    <h2>103</h2>
                    <p>Null Pointer</p>
                  </div>
                </div>
                <div class="card-stacked red darken-1">
                  <div class="card-content white-text">
                    <h2>103</h2>
                    <p>Null Pointer</p>
                  </div>
                </div>
              </div>
              <p>This would be the event description. This would be the event description. This would be the event description.</p>
            </div>
          </div>

          <div class="card-stacked">
            <div class="card horizontal">
              <div class="card-stacked deep-orange darken-4">
                <div class="card-content white-text">
                  <h2>103</h2>
                  <p>Null Pointer</p>
                </div>
              </div>
              <div class="card-stacked green darken-4">
                <div class="card-content white-text">
                  <h2>103</h2>
                  <p>Null Pointer</p>
                </div>
              </div>
              <div class="card-stacked blue darken-4">
                <div class="card-content white-text">
                  <h2>103</h2>
                  <p>Null Pointer</p>
                </div>
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p>Event description goes somewhere</p>
                </div>
                <div class="card-action">
                  <a href="#">This is a link</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-stacked">
            <div class="card horizontal">
              <div class="card-stacked deep-orange darken-4">
                <div class="card-content white-text">
                  <h2>103</h2>
                  <p>Null Pointer</p>
                </div>
              </div>
              <div class="card-stacked green darken-4">
                <div class="card-content white-text">
                  <h2>103</h2>
                  <p>Null Pointer</p>
                </div>
              </div>
              <div class="card-stacked blue darken-4">
                <div class="card-content white-text">
                  <h2>103</h2>
                  <p>Null Pointer</p>
                </div>
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p>Event description goes somewhere</p>
                </div>
                <div class="card-action">
                  <a href="#">This is a link</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-stacked">
            <div class="card horizontal">
              <div class="card-stacked deep-orange darken-4">
                <div class="card-content white-text">
                  <h2>103</h2>
                  <p>Null Pointer</p>
                </div>
              </div>
              <div class="card-stacked green darken-4">
                <div class="card-content white-text">
                  <h2>103</h2>
                  <p>Null Pointer</p>
                </div>
              </div>
              <div class="card-stacked blue darken-4">
                <div class="card-content white-text">
                  <h2>103</h2>
                  <p>Null Pointer</p>
                </div>
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p>Event description goes somewhere</p>
                </div>
                <div class="card-action">
                  <a href="#">This is a link</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <br><br>
    </div>
  </div>

  <?php displayFooter(); ?>

  <!--  Scripts-->
  <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
  <script src="assets/lib/jquery/jquery-2.1.1.min.js"></script>
  <script src="assets/lib/materialize/js/materialize.js"></script>
  <!--<script src="js/init.js"></script>-->

  </body>

  <!--the animdations for the circles-->
  <script>
      function CircleAnimation( opt )
      {
          var context = opt.canvas.getContext("2d");
          var handle = 0;
          var current = 0;
          var percent = 0;

          this.start = function( percentage )
          {
              percent = percentage;
              // start the interval
              handle = setInterval( draw, opt.interval );
          }

          // fill the background color
          context.fillStyle = "rgba(0, 0, 0, 0)";
          context.fillRect( 0, 0, opt.width, opt.height );

          // draw a circle
          context.arc( opt.width / 2, opt.height / 2, opt.radius, 0, 2 * Math.PI, false );
          context.lineWidth = opt.linewidth;
          context.strokeStyle = opt.circlecolor;
          context.stroke();

          function draw()
          {
              // make a circular clipping region
              context.beginPath();
              context.arc( opt.width / 2, opt.height / 2, opt.radius-(opt.linewidth/2.3), 0, 2 * Math.PI, false );
              context.clip();

              // draw the current rectangle
              var height = ((100-current)*opt.radius*2)/100 + (opt.height-(opt.radius*2))/2;
              context.fillStyle = opt.fillcolor;
              context.fillRect( 0, height, opt.width, opt.radius*2 );

              // clear the interval when the animation is over
              if ( current < percent ) current+=opt.step;
              else clearInterval(handle);
          }
      }
      <?php
			$teams = TeamsGateway::getAllTeams();
			$totalPoints = PointsGateway::sumPoints();
			foreach($teams as $team)
			{
				$name = $team['Name'];
				$logo = $team['Logo'];
				$color = $team['Color'];
				$points = $team['Points'];
				$fillAmount = $points / $totalPoints['Points'] * 100;
				echo <<<_END
				var canvas = document.getElementById("$name");
	          new CircleAnimation({
	              'canvas': canvas,
	              'width': canvas.width,
	              'height': canvas.height,
	              'radius': 100,
	              'linewidth': 10,
	              'interval': 20,
	              'step': 1,
	              'circlecolor': '#808080',
	              'fillcolor': "$color" //Need proper color for crew
	          }).start( $fillAmount ); //This is where the sizes of the drawn color is modified.


_END;
			}
			 ?>
  </script>
</html>
