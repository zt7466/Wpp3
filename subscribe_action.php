<?php
    require_once 'email/emailHandler.php';

    $verification_message = "You have signed up for notifications from the Crew Scoreboard!\r\n" .
    "Please follow the following link to verify your email: http://webprog.cs.ship.edu/webprog27/verify_email.php?token=gobbledygook";

    $e = new EmailTools();
    $result = $e->sendmail($_POST['email'], "Verification Email", $verification_message);

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
        <div class="container">
            <div class="col s12">
                <?php if($result) { ?>
                <h1>A verification email has been sent to <?php echo $_POST['email']; ?></h1>
                <?php } else { ?>
                <h1>A verification email could not be sent to <?php echo $_POST['email']; ?></h1>
                <?php } ?>
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