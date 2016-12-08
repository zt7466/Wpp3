<?php
require_once 'config.php';

  /**
   * Drew Rife and Zachary Thompson
   *
   * A gateway for the teams table
   */
  class TeamsGateway
  {
    private static $connection = null;

    /**
     * @return the connection to the database
     */
    private static function getConnection()
    {
      global $credentials;
      if(is_null(TeamsGateway::$connection))
      {
        try {
          TeamsGateway::$connection = new PDO($credentials['db'], $credentials['username'], $credentials['password']);
          TeamsGateway::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          TeamsGateway::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
          echo 'Connection failed: ' . $e->getMessage() . '<br/>';
        }
      }

      return TeamsGateway::$connection;
    }

    /**
     * inserts a team into the teams table
     *
     * @param  $name
     * @param  $logo
     * @param  $color
     * @return true if executed; false otherwise
     */
    public static function insert($name, $logo, $color)
    {
      $statement = null;
      $successful = false;

      try
      {
        $statement = TeamsGateway::getConnection()->prepare("INSERT INTO webprog27.Teams (Name, Logo, Color) VALUES (:name, :logo, :color)");
        $statement->bindParam(':name', $name);
        $statement->bindParam(':logo', $logo);
        $statement->bindParam(':color', $color);
        $successful = $statement->execute();
      }
      catch (PDOException $e)
      {
        $successful = false;
        // echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
      return $successful;
    }

    /**
     * gets all the teams from the Teams table
     * @return $allTeams - array of all teams
     */
    public function getAllTeams()
    {
      $statement = null;
      $allTeams = null;

      try
      {
        $statement = TeamsGateway::getConnection()->prepare("SELECT * FROM webprog27.Teams");
        $statement->execute();
        $allTeams = $statement->fetchAll();
        print_r($allTeams);
      }
      catch (PDOException $e)
      {
        $successful = false;
        // echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
      return $allTeams;
    }

    /**
     * Updates a team by their id
     * @param  $id
     * @param  $name
     * @param  $logo
     * @param  $color
     * @return true if executed; false otherwise
     */
    public function updateTeam($id, $name, $logo, $color)
    {
      $statement = null;
      $successful = false;

      try
      {
          $statement = TeamsGateway::getConnection()->prepare("UPDATE webprog27.Teams set Name=:name, Logo=:logo, Color=:color WHERE ID=:id");
          $statement->bindParam(':name', $name);
          $statement->bindParam(':logo', $logo);
          $statement->bindParam(':color', $color);
          $statement->bindParam(':id', $id);
          $successful = $statement->execute();
      }
      catch (PDOException $e)
      {
        $successful = false;
        // echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
      return $successful;
    }

    public function deleteTeam($id)
    {
      $statement = null;
      $successful = false;

      try
      {
          $statement = TeamsGateway::getConnection()->prepare("DELETE FROM webprog27.Teams WHERE ID=:id");
          $statement->bindParam(':id', $id);
          $successful = $statement->execute();
      }
      catch (PDOException $e)
      {
        $successful = false;
        // echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
      return $successful;
    }
  }
?>
