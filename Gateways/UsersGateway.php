<?php
require_once 'config.php';
date_default_timezone_set("UTC");

  class UsersGateway
  {
    private static $connection = null;

    /**
		 * @return the connection to the database
		 */
    private static function getConnection()
    {
      global $credentials;
      if(is_null(UsersGateway::$connection))
      {
        try {
          UsersGateway::$connection = new PDO($credentials['db'], $credentials['username'], $credentials['password']);
          UsersGateway::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          UsersGateway::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
          echo 'Connection failed: ' . $e->getMessage() . '<br/>';
        }
      }

      return UsersGateway::$connection;
    }

    /**
     * inserts the essentials of a user
     * @param  $username
     * @param  $password
     */
    public static function insert($username, $password)
    {
      $statement = null;
      $successful = false;
      try
      {
        $statement = UsersGateway::getConnection()->prepare("INSERT INTO webprog27.Users (Username, Password) VALUES (:username, :password)");
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);
        $successful = $statement->execute();
      }
      catch (PDOException $e)
      {
        $statement = false;
        // echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
      return $successful;
    }

    /**
     * updates the Users table when a user logins to save the date and time of the login and to save their token and its validity
     *
     * @param  $time
     * @param  $token
     * @param  $username
     */
    public static function loginUpdate($token, $username)
    {
      $statement = null;
      $successful = false;
      try
      {
        $statement = UsersGateway::getConnection()->prepare("UPDATE webprog27.Users set LastLogin=:lastlogin, Token=:token, TokenValidity=:tokenvalidity WHERE Username=:username");
        $statement->bindParam(':lastlogin', date("Y-m-d H:i:s"));
        $statement->bindParam(':token', $token);
        $statement->bindParam(':tokenvalidity', date("Y-m-d H:i:s"));
        $statement->bindParam(':username', $username);
        $successful = $statement->execute();
      }
      catch(PDOException $e)
      {
        $statement = false;
        // echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
      return $successful;
    }

    /**
     * returns the resultset as an array for the query of getting all the information from a specified username
     *
     * @param  $username
     * @return $result
     */
    public static function findUser($username)
    {
      $result = null;
      $statement = null;
      try
      {
        $statement = UsersGateway::getConnection()->prepare("SELECT * FROM webprog27.Users WHERE Username=:username");
        $statement->bindParam(':username', $username);
        $statement->execute();
        $result = $statement->fetchAll();
      }
      catch(PDOException $e)
      {
        $successful = false;
        // echo "\n\n\nError: " . $e->getMessage() . "\n\n\n";
      }
      // print_r($result);
      $statement->closeCursor();
      return $result;
    }

    /**
     * updates the password for a given user
     *
     * @param  $username
     * @param  $newPassword
     */
    public static function updatePassword($username, $newPassword)
    {
      $statement = null;
      $successful = false;
      try
      {
        $statement = UsersGateway::getconnection()->prepare("UPDATE webprog27.Users set Password=:newPassword WHERE Username=:username");
        $statement->bindParam(':newPassword', $newPassword);
        $statement->bindParam(':username', $username);
        $successful = $statement->execute();
      }
      catch (PDOException $e)
      {
        $statement = false;
        // echo "\n\n\nError: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
      return $successful;
    }

    /**
     * updates the last login of the user
     *
     * @param  $username
     * @return true if the code executed succesfully; false otherwise and will print exception
     */
    public static function updateLastLogin($username)
    {
      $statement = null;
      $successful = false;
      try
      {
        $statement = UsersGateway::getConnection()->prepare("UPDATE webprog27.Users set LastLogin=:lastLogin WHERE Username=:username");
        $statement->bindParam(':lastLogin', date("Y-m-d h:i:s"));
        $statement->bindParam(':username', $username);
        $successful = $statement->execute();
      }
      catch (PDOException $e)
      {
        $successful = false;
        // echo "\n\n\nError: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
      return $successful;
    }
  }
?>
