<?php

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
}

?>