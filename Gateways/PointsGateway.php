<?php
require_once 'config.php';

	/**
	 * Drew Rife and Zachary Thompson
	 *
	 * A gateway for the teams table
	 */
	class PointsGateway
	{
		private static $connection = null;

		/**
		 * @return the connection to the database
		 */
		private static function getConnection()
		{
			global $credentials;
			if(is_null(PointsGateway::$connection))
			{
				try {
					PointsGateway::$connection = new PDO($credentials['db'], $credentials['username'], $credentials['password']);
				} catch (PDOException $e) {
					echo 'Connection failed: ' . $e->getMessage() . '<br/>';
				}
			}

			return PointsGateway::$connection;
		}
?>
