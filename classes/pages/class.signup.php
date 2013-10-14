<?php

	require_once('../classes/class.GeneralPageClass.php');
	require_once('../classes/class.Database.php');

	class TPageClass extends TGeneralPageClass {
		function init() {
			$this->Database = new TDatabase();
			if (!isset($_POST['submit'])){ 
				$this->createContent();
				$this->showContent();
			}		
		}
		function handleFormSubmission() {
			$user = $this->safePost['username'];
			$pass = $this->safePost['password'];
			$sqlQuery = "INSERT into users (username, password) values ('".$user."', '".$pass."')";
			$this->Database->singleInsertQuery($sqlQuery);
			echo 'Hey, '.$user.'!<br />';


		}
	}
