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
        <title>Sign Up</title>
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/lib/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link rel='site icon' href='favicon.ico' type='image/x-icon'/>
        <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
    </head>
    <body>
        <?php displayNavbar(); ?>
        <br/>
        <br/>
        <div class="container">
            <div class="input-field col s12">
                <form action="subscribe_action.php" method="post">
                    <input placeholder="Your Email" name="email" type="text" class="validate">
                    <label for="first_name">Email</label>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </form>
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