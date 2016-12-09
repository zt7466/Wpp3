<?php
/**
 * Drew Rife and Zachary Thompson
 *
 * Handles getting the connection for the database
 */
require_once 'config.php';

  class ConnectionHandler
  {
    private static $connection = null;

    /**
     * @return the connection to the database
     */
    public static function getConnection()
    {
        global $credentials;
        if(is_null(ConnectionHandler::$connection))
        {
          try
          {
            ConnectionHandler::$connection = new PDO($credentials['db'], $credentials['username'], $credentials['password']);
            ConnectionHandler::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            ConnectionHandler::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          } catch (PDOException $e) {
  					echo 'Connection failed: ' . $e->getMessage() . '<br/>';
  				}
        }

        return ConnectionHandler::$connection;
    }
  }
?>
