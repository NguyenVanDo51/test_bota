<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Content-Type: application/json; charset=UTF-8');


	/**
	*
	*/
	class DbModel
	{
		public function connect(){
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = 'test_bota';

			try {
				$conn = new PDO("mysql:host=$servername;dbname=" . $dbname, $username, $password);
				// set the PDO error mode to exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn ;
			} catch(PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
			}
		}

	}
 ?>
