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
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        require_once 'email/emailHandler.php';
                        require_once 'Gateways/TeamsGateway.php';
                        require_once 'Gateways/EventsGateway.php';
                        
                        $tg = new TeamsGateway();
                        $teams = $tg->getAllTeams();

                        $email_body = 
                            "Current Team Scores: \r\n";

                        foreach($teams as $team) {
                            $email_body = $email_body .
                                $team['Name'] . ": " . $team['Points'] . '\r\n';
                        }

                        $email_body = $email_body .
                            "\r\nRecent Events: \r\n";

                        $evg = new EventsGateway();
                        $events = $evg->getAllEventsLimit(5);

                        

                        foreach($events as $event) {

                        }

                        $mailer = new EmailTools();
                        $result = $mailer->emailEveryone("SUBJECT", "BODY");
                    ?>
                    <h3>Emails sent</h3>

                    <?php } else { ?>

                    <form action="subscribe_test.php" method="post">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Send sample notification
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
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