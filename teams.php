<?php
	//Require the navbar file to run
	require_once 'navbar.php';
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
  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
</head>
<body>
  <?php displayNavbar(); ?>
  <body>
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
          <br><br>
          <div id="teams" class="row">
            <div class="col s12 m7">
              <div class="card horizontal">
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

            <div class="col s12 m7">
              <div class="card horizontal">
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
            <div class="col s12 m7">
              <div class="card horizontal">
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
  </body>


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
