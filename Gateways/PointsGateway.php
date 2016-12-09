<?php
require_once 'ConnectionHandler.php';

	/**
	 * Drew Rife and Zachary Thompson
	 *
	 * A gateway for the teams table
	 */
	class PointsGateway
	{
		/**
		 * inserts points into a table
		 * @param  $points
		 * @param  $eventID
		 * @param  $teamID
		 * @return true if execution successful; false otherwise
		 */
		public function insert($points, $eventID, $teamID)
		{
			$statement = null;
			$successful = false;
			$convertedPoints = (string)$points;

			try
			{
				$statement = ConnectionHandler::getConnection()->prepare("INSERT INTO webprog27.Points (Points, EventID, TeamID) VALUES (:points, :eventID, :teamID)");
				$statement->bindParam(':points', $convertedPoints);
				$statement->bindParam(':eventID', $eventID);
				$statement->bindParam(':teamID', $teamID);
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
		 * updates the points of the table (should not be able to update Team or Event ID)
		 * @param  $id
		 * @param  $points
		 * @return true if executed correctly; false otherwise
		 */
		public function update($id, $points)
		{
			$statement = null;
			$successful = false;
			$convertedPoints = (string)$points;

			try
			{
				$statement = ConnectionHandler::getConnection()->prepare("UPDATE webprog27.Points set Points=:points WHERE ID=:id");
				$statement->bindParam(':points', $convertedPoints);
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
		 * removes a row from the Points gateway
		 * @param  $id
		 * @return true if executed; false otherwise
		 */
		public function remove($id)
		{
			$statement = null;
			$successful = false;

			try
			{
				$statement = ConnectionHandler::getConnection()->prepare("DELETE FROM webprog27.Points WHERE ID=:id");
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
		 * retrieves all data based on query by teamID
		 * @param  $teamID
		 * @return array of all data from query by teamID
		 */
		public function retrieveByTeamID($teamID)
		{
			$statement = null;
			$resultsByTeam = null;

			try
			{
				$statement = ConnectionHandler::getConnection()->prepare("SELECT * FROM webprog27.Points WHERE TeamID=:teamID");
				$statement->bindParam(':teamID', $teamID);
				$statement->execute();
				$resultsByTeam = $statement->fetchAll();
			}
			catch (PDOException $e)
      {
				$successful = false;
        // echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
      return $resultsByTeam;
		}

		/**
		 * retrieve all the data by a query for just an eventID
		 * @param  $eventID
		 * @return all data from a query by the eventID
		 */
		public function retrieveByEventID($eventID)
		{
			$statement = null;
			$resultsByEvent = null;

			try
			{
				$statement = ConnectionHandler::getConnection()->prepare("SELECT * FROM webprog27.Points WHERE EventID=:eventID");
				$statement->bindParam(':eventID', $eventID);
				$statement->execute();
				$resultsByEvent = $statement->fetchAll();
			}
			catch (PDOException $e)
      {
				$successful = false;
        // echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
      return $resultsByEvent;
		}

		/**
		 * @return all points from the Points table
		 */
		public function retrieveAllPoints()
		{
			$statement = null;
			$allPoints = null;

			try
			{
				$statement = ConnectionHandler::getConnection()->prepare("SELECT * FROM webprog27.Points");
				$statement->execute();
				$allPoints = $statement->fetchAll();
			}
			catch (PDOException $e)
      {
				$successful = false;
        // echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
      }

      $statement->closeCursor();
      return $allPoints;
		}
	}
?>
