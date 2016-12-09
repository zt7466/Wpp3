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
				$statement = ConnectionHandler::getConnection()->prepare("INSERT INTO webprog27.Emails (Email, VerificationID, UnsubscribeID) VALUES (:email, :verificationID, :unsubscribeID)");
				$statement->bindParam(':email', $email);
				$statement->bindParam(':verificationID', $verificationID);
				$statement->bindParam(':unsubscribeID', $unsubscribeID);
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
		 * TODO: ASK JOSS ABOUT
		 */
	// 	public static function update($verified)
	// 	{
	// 		$statement = null;
	// 		$successful = false;
	//
	// 		try
	// 		{
	//
	// 		}
	// 		catch (PDOException $e)
  //     {
  //       echo "\n\n\nERROR: " . $e->getMessage() . "\n\n\n";
  //     }
	//
	// 		$statement->closeCursor();
	// 		return $successful;
	// 	}
	}

	if(EmailsGateway::insert('dr5801@ship.edu', '2987398hfajkhsdf', '2135asdf45454'))
	{
		echo 'execution successful';
	}


?>
