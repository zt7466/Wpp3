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

<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Team Homepage</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="assets/lib/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
</head>
<body>
  <div class="navbar-fixed">
    <nav class="light-blue" style="box-shadow: 0 0 0 0;">
      <?php displayNavbar() ?>
    </nav>
  </div>
  <div class="section no-pad-bot light-blue" id="index-banner">
    <div class="container">
      <br><br>

      <div class="row">
        <div class="col s12 l4">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Null Pointer</span>
              <h1>1337</h1>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">View team page</a>
            </div>
          </div>
        </div>
        <div class="col s12 l4">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Off by Something</span>
              <h1>154</h1>
              <p>TODO: Tweak card layout so it actually looks good</p>
              <p>TODO: Lock all cards to same height</p>
              <p>TODO: Decide on style for event cards</p>              
              <p>TODO: Decide on page layout: 2 columns or 1 or something more exotic</p>              
              <p>TODO: Make favicon</p>
            </div>
            <div class="card-action">
              <a href="#">View team page</a>
            </div>
          </div>
        </div>
        <div class="col s12 l4">
          <div class="card">
            <div class="card-content">
              <span class="card-title">The other one</span>
              <h1>Like 1</h1>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
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
</html>