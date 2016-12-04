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
      try
      {
        $statement = UsersGateway::getConnection()->prepare("INSERT INTO webprog27.Users (Username, Password) VALUES (:username, :password)");
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);
        $statement->execute();
      }
      catch (PDOException $e)
      {
        echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
    }

    /**
     * updates the Users table when a user logins to save the date and time of the login and to save their token and its validity
     *
     * @param  $time
     * @param  $token
     * @param  $username
     */
    public static function loginUpdate($time, $token, $username)
    {
      $statement = null;
      try
      {
        $statement = UsersGateway::getConnection()->prepare("UPDATE webprog27.Users set LastLogin=:lastlogin, Token=:token, TokenValidity=:tokenvalidity WHERE Username=:username");
        $statement->bindParam(':lastlogin', $time);
        $statement->bindParam(':token', $token);
        $statement->bindParam(':tokenvalidity', $time);
        $statement->bindParam(':username', $username);
        $statement->execute();
      }
      catch(PDOException $e)
      {
        echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
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
        echo "\n\n\nError: " . $e->getMessage() . "\n\n\n";
      }
      print_r($result);
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
      try
      {
        $statement = UsersGateway::getconnection()->prepare("UPDATE webprog27.Users set Password=:newPassword WHERE Username=:username");
        $statement->bindParam(':newPassword', $newPassword);
        $statement->bindParam(':username', $username);
        $statement->execute();
      }
      catch (PDOException $e)
      {
        echo "\n\n\nError: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
    }

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
        echo "\n\n\nError: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
      return $successful;
    }
  }

  // UsersGateway::insert('drew', 'hello');
  // UsersGateway::loginUpdate(date("Y-m-d h:i:s"), '2132154jhkhkjhl456', 'drew');
  // UsersGateway::findUser('drew');
  // UsersGateway::updatePassword('drew', 'zachIsStupid96');
  // UsersGateway::updateLastLogin('drew');
?>
