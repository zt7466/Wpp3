<?php
require_once 'ConnectionHandler.php';

  /**
   * Drew Rife and Zachary Thompson
   *
   * A gateway for the teams table
   */
  class TeamsGateway
  {
    /**
     * inserts a team into the teams table
     *
     * @param  $name
     * @param  $logo
     * @param  $color
     * @return true if executed; false otherwise
     */
    public static function insert($name, $color)
    {
      $statement = null;
      $successful = false;
      $logo = "~/public_html/assets/logos/" . $name . ".png";

      try
      {
        $statement = ConnectionHandler::getConnection()->prepare("INSERT INTO webprog27.Teams (Name, Logo, Color) VALUES (:name, :logo, :color)");
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
        $statement = ConnectionHandler::getConnection()->prepare("SELECT * FROM webprog27.Teams");
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
          $statement = ConnectionHandler::getConnection()->prepare("UPDATE webprog27.Teams set Name=:name, Logo=:logo, Color=:color WHERE ID=:id");
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

    /**
     * deletes a team by id
     * @param  $id
     * @return
     */
    public function deleteTeam($id)
    {
      $statement = null;
      $successful = false;

      try
      {
          $statement = ConnectionHandler::getConnection()->prepare("DELETE FROM webprog27.Teams WHERE ID=:id");
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
