<?php

	require_once('../classes/class.GeneralPageClass.php');
	
	require_once('../classes/class.Database.php');

	class TPageClass extends TGeneralPageClass {
		
		function init() {
			$this->createContent();
			$this->showContent();		
			$this->database = new TDatabase();
		}
		function handleFormSubmission(){
			print_r($this->safePost);
			echo '<br />';


			$sqlQuery = "SELECT count(*) as count from users.users WHERE username = '".$this->safePost['username']."' and password = '".$this->safePost['password']."'";
			print_r($this->database->singleRowQuery($sqlQuery));
		}
	}
