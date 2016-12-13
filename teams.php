<?php
	//Require the navbar file to run
	require_once 'navbar.php';
	require_once 'footer.php';
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

  <?php displayFooter(); ?>

  <!--  Scripts-->
  <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
  <script src="assets/lib/jquery/jquery-2.1.1.min.js"></script>
  <script src="assets/lib/materialize/js/materialize.js"></script>
  <!--<script src="js/init.js"></script>-->

  </body>

</html>
