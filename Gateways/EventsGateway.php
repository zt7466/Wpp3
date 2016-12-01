<?php
require_once 'config.php';

    /**
     * Drew Rife and Zachary Thompson
     *
     * A gateway for the emails table
     */
    class EventsGateway
    {
      private static $connection = null;

      /**
  		 * @return the connection to the database
  		 */
      private static function getConnection()
      {
        global $credentials;
        if(is_null(EventsGateway::$connection))
        {
          try {
            EventsGateway::$connection = new PDO($credentials['db'], $credentials['username'], $credentials['password']);
          } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage() . '<br/>';
          }
        }

        return EventsGateway::$connection;
      }
    }
?>
