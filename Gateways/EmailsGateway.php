<?php
require_once 'ConnectionHandler.php';

	/**
	 * Drew Rife and Zachary Thompson
	 *
	 * A gateway for the emails table
	 */
	class EmailsGateway
	{
		private static $connection = null;

		/**
		 * inserts an email into the Emails table
		 * @param  $email
		 * @param  $verificationID
		 * @param  $unsubscribeID
		 * @return true if executed; false otherwise
		 */
		public static function insert($email, $verificationID, $unsubscribeID)
		{
			$statement = null;
			$successful = false;

			try
			{
				$statement = ConnectionHandler::getConnection()->prepare("INSERT INTO webprog27.Emails (Email, Verified, VerificationID, UnsubscribeID) VALUES (:email, 0, :verificationID, :unsubscribeID)");
				$statement->bindParam(':email', $email);
				$statement->bindParam(':verificationID', $verificationID);
				$statement->bindParam(':unsubscribeID', $unsubscribeID);
				$successful = $statement->execute();
			}
			catch (PDOException $e)
      		{
				$successful = false;
        		//echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
      		}

			$statement->closeCursor();
			return $successful;
		}

		/**
		 * Author: Joss
		 */
		public static function verify($verificationID)
		{
			$statement = null;
			$successful = false;
	
			try
			{
				$statement = ConnectionHandler::getConnection()->prepare("UPDATE webprog27.Emails SET Verified=1 WHERE VerificationID = :verificationID");
				$statement->bindParam(':verificationID', $verificationID);				
				$successful = $statement->execute();	
			}
			catch (PDOException $e)
			{
				echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
				$successful = false;
			}
	
			$statement->closeCursor();
			return $successful;
		}

		/**
		 * Author: Joss
		 */
		public static function unsubscribe($unsubscribeID)
		{
			$statement = null;
			$successful = false;
	
			try
			{
				$statement = ConnectionHandler::getConnection()->prepare("DELETE FROM webprog27.Emails WHERE UnsubscribeID = :unsubscribeID");
				$statement->bindParam(':unsubscribeID', $unsubscribeID);
				$successful = $statement->execute();	
			}
			catch (PDOException $e)
			{
				echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
			}
	
			$statement->closeCursor();
			return $successful;
		}


		/**
		 * Author: Joss
		 */
		public static function getVerifiedEmails()
		{
			$statement = null;
			$successful = false;
	
			try
			{
				$statement = ConnectionHandler::getConnection()->prepare("SELECT Email FROM webprog27.Emails WHERE Verified = 1");
				$successful = $statement->execute();	
          		$result = $statement->fetchAll();
			}
			catch (PDOException $e)
			{
				echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
			}
	
			$statement->closeCursor();
			return $result;
		}
	}
?>
