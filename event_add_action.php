<?php
	//Require the navbar file to run
    require_once 'navbar.php';
    require_once 'footer.php';
    require_once 'Gateways/EventsGateway.php';
    require_once 'Gateways/PointsGateway.php';

    session_start();
    $logged_in = true;

	//Check to make sure the user has a session. Otherwise,
	//redirect them to the home page.
	if(strlen($_SESSION['username']) <= 0 || strlen($_SESSION['token']) <= 0)
	{
		destroySession();
		echo '<meta http-equiv="refresh" content="0; url=index.php"/>';
	}

    $id = EventsGateway::insert($_POST['event_name'], $_POST['event_date'], $_POST['event_description']);

    foreach($_POST as $key => $value)
    {
        if (is_int($key))
        {
            echo "Inserting: (" . $id . ") " . $key . " - " . $value . "\r\n";
            PointsGateway::insert($value, $id, $key);
        }
    }

	echo '<meta http-equiv="refresh" content="0; url=events_page.php"/>';
?>
