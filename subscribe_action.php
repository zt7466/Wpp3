<?php
    require_once 'email/emailHandler.php';
    require_once 'Gateways/EmailsGateway.php';

    $verification_message = "You have signed up for notifications from the Crew Scoreboard!\r\n" .
    "Please follow the following link to verify your email: http://webprog.cs.ship.edu/webprog27/subscribe_verify.php?token=";

    // ... Theoretically these could return duplicate values.
    // But whatever. There's like a 1:10398423245731249878907189074 chance
    $sub_id = uniqid();
    $unsub_id = uniqid();

    $e = new EmailTools();
    $result = $e->sendmail($_POST['email'], "Verification Email", $verification_message . $sub_id);

    if($result) {
        $g = new EmailsGateway();

        $result = $g->insert($_POST['email'], $sub_id, $unsub_id);
    }
    
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
                <h3>A verification email has been sent to <?php echo $_POST['email']; ?></h3>
                <?php } else { ?>
                <h3>A verification email could not be sent to <?php echo $_POST['email']; ?></h3>
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