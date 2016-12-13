<?php
require_once 'ConnectionHandler.php';

    /**
     * Drew Rife and Zachary Thompson
     *
     * A gateway for the events table
     */
    class EventsGateway
    {
      /**
       * inserts an event into the Events table
       *        *
       * @param  $name
       * @param  $date
       * @param  $description
       * @return true if executed; false otherwise
       */
      public static function insert($name, $date, $description)
      {
        $statement = null;
        $successful = false;

        try
        {
          $statement = ConnectionHandler::getConnection()->prepare("INSERT INTO webprog27.Events (Name, Date, Description) VALUES (:name, :date, :description)");
          $statement->bindParam(':name', $name);
          $statement->bindParam(':date', $date);
          $statement->bindParam(':description', $description);
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
       * finds events by querying for a string that contains the parameter string
       *
       * @param  $name
       */
      public static function getEventsByName($name)
      {
        $statement = null;
        $result = null;
        $searchName = "%" . $name . "%";

        try
        {
          $statement = ConnectionHandler::getConnection()->prepare("SELECT * FROM webprog27.Events WHERE Name LIKE :name");
          $statement->bindParam(':name', $searchName);
          $statement->execute();
          $result = $statement->fetchAll();
        }
        catch(PDOException $e)
        {
          $successful = false;
          // echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
        }

        $statement->closeCursor();
        return $result;
      }

      /**
       * @return all events
       */
      public static function getAllEvents()
      {
        $statement = null;
        $allEvents = null;

        try
        {
          $statement = ConnectionHandler::getConnection()->prepare("Select * FROM webprog27.Events");
          $statement->execute();
          $allEvents = $statement->fetchAll();
        }
        catch(PDOException $e)
        {
          $successful = false;
          // echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
        }

        $statement->closeCursor();
        return $allEvents;
      }

      /**
       * @return all events
       */
      public static function getAllEventsLimit($limit)
      {
        $statement = null;
        $allEvents = null;

        try
        {
          $statement = ConnectionHandler::getConnection()->prepare("Select * FROM webprog27.Events ORDER BY Date DESC LIMIT :limit");
          $statement->bindParam(':limit', $limit);
          $statement->execute();
          $allEvents = $statement->fetchAll();
        }
        catch(PDOException $e)
        {
          $successful = false;
          // echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
        }

        $statement->closeCursor();
        return $allEvents;
      }

      /**
       * @return recent events joined to points joined to teams
       */
      public static function getRecentEvents($limit)
      {
        $statement = null;
        $allEvents = null;

        try
        {
          $statement = ConnectionHandler::getConnection()->prepare("SELECT e.ID as id, e.Name as event_name, e.Date as event_date, e.Description as event_desc, t.Name as team_name, p.Points as points FROM Events e JOIN Points p ON p.EventID = e.ID JOIN Teams t ON p.TeamID = t.ID ORDER BY e.Date DESC LIMIT :limit");
          $statement->bindParam(':limit', $limit);
          $statement->execute();
          $allEvents = $statement->fetchAll();
        }
        catch(PDOException $e)
        {
          $successful = false;
          // echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
        }

        $statement->closeCursor();
        return $allEvents;
      }

      /**
       * updates an event
       *
       * @param  $id
       * @param  $name
       * @param  $date
       * @param  $description
       */
      public static function updateEvent($id, $name, $date, $description)
      {
        $statment = null;
        $successful = false;
        try
        {
          $statement = ConnectionHandler::getConnection()->prepare("UPDATE webprog27.Events set Name=:name, Date=:date, Description=:description WHERE ID=:id");
          $statement->bindParam(':name', $name);
          $statement->bindParam(':date', $date);
          $statement->bindParam(':description', $description);
          $statement->bindParam(':id', $id);
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

      /**
       * deletes event by its id
       * @param  $id
       * @return true if executed; false otherwise
       */
      public static function removeEvent($id)
      {
        $statement = null;
        $successful = false;

        try
        {
          $statement = ConnectionHandler::getConnection()->prepare("DELETE FROM Events WHERE ID=:id");
          $statement->bindParam(':id', $id);
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
