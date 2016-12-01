<?php
require_once 'config.php';

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
      $statement = UsersGateway::getConnection()->prepare("INSERT INTO webprog27.Users (Username, Password) VALUES (:username, :password)");
      $statement->bindParam(':username', $username);
      $statement->bindParam(':password', $password);
      print_r($statement);
      $statement->execute();
      $statement->close();
    }
  }

  UsersGateway::insert('drew', 'hello');
?>
