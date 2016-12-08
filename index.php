<?php
	/*---------------------*
	 * Raistlin Hess       *
	 *---------------------*/
	 
	//Require the navbar file to run
	require_once 'navbar.php';
	session_start();
	//$gateway = new UsersGateway;
	//$result = $gateway->insert("raistlin","password");
	
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
  <script>
    $( document ).ready(function(){$(".button-collapse").sideNav();});
  </script>
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
        <div class="col s12 l4">
          <div class="card large">
            <div class="card-image">
              <canvas id="Crew1" style="padding-left: 0;padding-right: 0;margin-left: auto;margin-right: auto;display: block;"width="215" height="220"></canvas>
            </div>
            <div class="card-content">
              <span class="card-title">Null Pointer</span>
              <h1 id="Crew1Score">[Score]</h1>
            </div>
            <div class="card-action">
              <a href="#">View team page</a>
            </div>
          </div>
        </div>
        <div class="col s12 l4">
          <div class="card large">
            <div class="card-image">
              <canvas id="Crew2" style="padding-left: 0;padding-right: 0;margin-left: auto;margin-right: auto;display: block;"width="215" height="220"></canvas>
            </div>
            <div class="card-content">
              <span class="card-title">Off by One</span>
              <h1 id="Crew2SCore">[Score]</h1>

            </div>
            <div class="card-action">
              <a href="#">View team page</a>
            </div>
          </div>
        </div>
        <div class="col s12 l4">
          <div class="card large">
            <div class="card-image">
              <canvas id="Crew3" style="padding-left: 0;padding-right: 0;margin-left: auto;margin-right: auto;display: block;"width="215" height="220"></canvas>
            </div>
            <div class="card-content">
              <span class="card-title">Out of Bounds</span>
              <h1 id="Crew3Score">[Score]</h1>
            </div>
            <div class="card-action">
              <a href="#">View team page</a>
            </div>
          </div>
        </div>
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
      // create the new object, add options, and start the animation with desired percentage
      var canvas = document.getElementById("Crew1");
      new CircleAnimation({
          'canvas': canvas,
          'width': canvas.width,
          'height': canvas.height,
          'radius': 100,
          'linewidth': 10,
          'interval': 20,
          'step': 1,
          'circlecolor': '#808080',
          'fillcolor': '#0000CD'  //Need proper color for crew
      }).start( 70 ); //This is where the sizes of the drawn color is modified.
      var canvas = document.getElementById("Crew2");
          new CircleAnimation({
              'canvas': canvas,
              'width': canvas.width,
              'height': canvas.height,
              'radius': 100,
              'linewidth': 10,
              'interval': 20,
              'step': 1,
              'circlecolor': '#808080',
              'fillcolor': '#7CFC00'  //Need proper color for crew
          }).start( 30 ); //This is where the sizes of the drawn color is modified.
      var canvas = document.getElementById("Crew3");
          new CircleAnimation({
              'canvas': canvas,
              'width': canvas.width,
              'height': canvas.height,
              'radius': 100,
              'linewidth': 10,
              'interval': 20,
              'step': 1,
              'circlecolor': '#808080',
              'fillcolor': '#FF0000' //Need proper color for crew
          }).start( 50 ); //This is where the sizes of the drawn color is modified.
  </script>
</html>