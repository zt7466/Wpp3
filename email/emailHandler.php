<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '/home/webprog27/public_html/Gateways/EmailsGateway.php';

/* Careful guys, this email stuff is crazy complicated */
/* Author: Joss Steward */
class EmailTools
{
    /* Send an email */
    public static function sendmail($to, $subject, $body)
    {
        $headers = "From: noreply@cs.ship.edu";
        return mail($to, $subject, $body, $headers);
    }

    /* This is a little job that sends a single email to all the verified emails */
    public static function emailEveryone($subject, $body) 
    {
        $g = new EmailsGateway();
        $emails = $g->getVerifiedEmails();

        foreach($emails as $email) {
            echo "Mailing: " . $email['Email'] . "<br/>";

            $email_text = $body . "\r\n" .
                "Email sent automatically, to unsubscribe click here: \r\n" . 
                "http://webprog.cs.ship.edu/webprog27/subscribe_unsub.php?token=" . 
                $email['UnsubscribeID'];

            $et = new EmailTools();
            $et->sendmail($email['Email'], $subject, $email_text);
        }

        return true;
    }
}

?>