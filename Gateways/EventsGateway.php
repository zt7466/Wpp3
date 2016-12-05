<?php
require_once 'config.php';

    /**
     * Drew Rife and Zachary Thompson
     *
     * A gateway for the events table
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
            EventsGateway::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage() . '<br/>';
          }
        }

        return EventsGateway::$connection;
      }

      /**
       * inserts an event into the Events table
       *
       * @param  $name
       * @param  $date
       * @param  $description
       */
      public static function insert($name, $date, $description)
      {
        $statement = null;
        try
        {
          $statement = EventsGateway::getConnection()->prepare("INSERT INTO webprog27.Events (Name, Date, Description) VALUES (:name, :date, :description)");
          $statement->bindParam(':name', $name);
          $statement->bindParam(':date', $date);
          $statement->bindParam(':description', $description);
          $statement->execute();
        }
        catch (PDOException $e)
        {
          echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
        }

        $statement->closeCursor();
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
          $statement = EventsGateway::getConnection()->prepare("SELECT * FROM webprog27.Events WHERE Name LIKE :name");
          $statement->bindParam(':name', $searchName);
          $statement->execute();
          $result = $statement->fetchAll();
        }
        catch(PDOException $e)
        {
          echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
        }
        print_r($result);
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
          $statement = EventsGateway::getConnection()->prepare("Select * FROM webprog27.Events");
          $statement->execute();
          $allEvents = $statement->fetchAll();
        }
        catch(PDOException $e)
        {
          echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
        }

        print_r($allEvents);
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
          $statement = EventsGateway::getConnection()->prepare("UPDATE webprog27.Events set Name=:name, Date=:date, Description=:description WHERE ID=:id");
          $statement->bindParam(':name', $name);
          $statement->bindParam(':date', $date);
          $statement->bindParam(':description', $description);
          $statement->bindParam(':id', $id);
          $successful = $statement->execute();
        }
        catch (PDOException $e)
        {
          echo "\n\n\nError: " . $e->getMessage() . "\n\n\n";
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
          $statement = EventsGateway::getConnection()->prepare("DELETE FROM Events WHERE ID=:id");
          $statement->bindParam(':id', $id);
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


    // EventsGateway::insert('hello', '2016-08-30', 'all webprog students need to meet at FSC165');
    // EventsGateway::insert('webprog meeting', '2016-08-30', 'all webprog students need to meet at FSC165');
    // EventsGateway::findEvents('web');
    // EventsGateway::updateEvent(16, 'exam final', '2200-08-07', 'we never passed LSA');
    // EventsGateway::getAllEvents();
    EventsGateway::removeEvent(15);










?>
