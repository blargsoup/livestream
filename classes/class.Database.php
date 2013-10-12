<?php

	require_once('../classes/class.Logging.php');
	

	//Database Class
	class TDatabase {
		function __construct() { 
			$this->Logging = new TLogging();

			if ($this->database = mysqli_connect("localhost","root","root","users")){
				$this->Logging->log("connected to database");

		//		$sqlQuery = "select * from users.users";
		//		$result = $this->database->query($sqlQuery);

		//		while($rows = mysqli_fetch_array($result, MYSQL_ASSOC)){

		//			print_r($rows);
		//		}
			} else {
				$this->Logging->log("could not connect to database!");
		
			}
		}

		function multiRowQuery($sqlQuery) {
				$result = $this->database->query($sqlQuery);
				$rows = array();
				while($rows = mysqli_fetch_aray($result, MYSQL_ASSOC)){
					$returnArray[] = $rows;
				}
				return $returnArray;
		}
		function singlerowQuery($sqlQuery) {
				$result = $this->database->query($sqlQuery);
				$rows = array();
				while($rows = mysqli_fetch_array($result, MYSQL_ASSOC)){
					return $rows;
				}
				// something is wrong if we get here
				return 0;
		}
	}
