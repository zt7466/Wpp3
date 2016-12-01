<?php
require_once 'config.php';

	/**
	 * Drew Rife and Zachary Thompson
	 *
	 * A gateway for the emails table
	 */
	class EmailsGateway
	{
		private static $connection = null;

		/**
		 * @return the connection to the database
		 */
		private static function getConnection()
		{
			global $credentials;
			if(is_null(EmailsGateway::$connection))
			{
				try {
					EmailsGateway::$connection = new PDO($credentials['db'], $credentials['username'], $credentials['password']);
				} catch (PDOException $e) {
					echo 'Connection failed: ' . $e->getMessage() . '<br/>';
				}
			}

			return EmailsGateway::$connection;
		}

		/**
		 * inserts a row into the Emails table
		 * @param  $email
		 */
		public static function insert($email)
		{
			$statement = EmailsGateway::getConnection()->prepare("INSERT INTO webprog27.Emails (Email) VALUES (:email)");
			$statement->bindParam(':email', $email);
			$statement->execute();
			$statement->close();
		}
	}

	EmailsGateway::insert('hello@aol.com');
?>
